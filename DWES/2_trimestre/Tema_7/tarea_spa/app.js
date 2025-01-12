const app = document.getElementById("app");

function loadNavbar(){
    return fetch("backend/navbar.php")
    .then(response => response.text())
};


function checkSession(){
    fetch("backend/check_session.php")
    .then(response => response.json())
    .then(data => {
        if (data.authenticated) {
            const currentBookId = sessionStorage.getItem("idActual");
            if (currentBookId) {
                loadLibroDetalles(currentBookId);
            }else{
                loadHome();
            }
        } else {
            loadLogin();
        }
    })
    .catch(error => {
        console.error("Error al verificar la sesión:", error);
        loadLogin();
    });
};


function handleLogout(){
    console.log("Iniciando cierre de sesión...");
    fetch("backend/logout.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            sessionStorage.removeItem("nombre_libro");
            loadLogin();
        } else {
            console.error("Error al cerrar sesión");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
};

function loadLogin(){
    app.innerHTML = `
        <h1>Iniciar Sesión</h1>
        <form id="loginForm">
            <label for="user">Correo:</label>
            <input type="email" id="user" name="user" required><br>
            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" name="pass" required><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <p id="error" style="color: red;"></p>
    `;

    document.getElementById("loginForm").addEventListener("submit", (e) => {
        e.preventDefault();
        const user = document.getElementById("user").value;
        const pass = document.getElementById("pass").value;

        fetch("backend/login.php", {
            method: "POST",
            body: JSON.stringify({ user, pass })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                loadHome();
            } else {
                document.getElementById("error").textContent = result.message;
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            document.getElementById("error").textContent = "Hubo un problema con el inicio de sesión.";
        });
    });
};

function loadHome(){
    loadNavbar().then(navbarHTML => {
        app.innerHTML = navbarHTML;
        
        fetch("backend/home.php")
        .then(response => response.json())
        .then(libros => {
            const librosHTML = `
                <h1>Catálogo de Libros</h1>
                <table border="2">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Puntuación promedio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${libros.map(libro => `
                            <tr>
                                <td>${libro.titulo}</td>
                                <td>${libro.autor}</td>
                                <td>${libro.categoria}</td>
                                <td>${libro.promedio}</td>
                                <td>
                                    <button class="detallesButton" data-id="${libro.id_libro}">Ver Detalles</button>
                                </td>
                            </tr>
                        `).join("")}
                    </tbody>
                </table>
            `;
            app.innerHTML += librosHTML;

            const nombreLibro = sessionStorage.getItem("nombre_libro");
            if (nombreLibro) {
               app.innerHTML += `
                   <h1>Último libro visitado:</h1>
                   <ul>
                       <li>${nombreLibro}</li>
                   </ul>
               `;
            }

            document.getElementById("logoutButton").addEventListener("click", handleLogout);

            document.querySelectorAll(".detallesButton").forEach(button => {
                button.addEventListener("click", () => {
                    const idLibro = button.getAttribute("data-id");
                    loadLibroDetalles(idLibro);
                });
            });
        })
    });
};

function loadLibroDetalles(idLibro) {
    sessionStorage.setItem("idActual", idLibro);
    loadNavbar().then(navbarHTML => {
        app.innerHTML = navbarHTML;

        fetch("backend/libro.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id_libro: idLibro })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }

            const { detalles, resenias } = data;

            sessionStorage.setItem("nombre_libro", detalles.titulo);
            const detallesHTML = `
                <h1>Detalles del Libro: ${detalles.titulo}</h1>
                <p><b>Autor:</b> ${detalles.autor}</p>
                <p><b>Categoría:</b> ${detalles.categoria}</p>
                <h2>Reseñas</h2>
                <ul>
                    ${resenias.map(resena => `
                        <li>${resena.email}: ${resena.puntuacion}/5 - ${resena.comentario}</li>
                    `).join("")}
                </ul>
                <h3>Tu Reseña</h3>
                <form id="reseñaForm">
                    <label>Puntuación: </label>
                    <select name="nota">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <label>Comentario:</label>
                    <textarea name="texto"></textarea><br>
                    <button type="submit">Guardar Reseña</button>
                </form>
                <p id="backButton"><a href="">Volver al Catálogo</a></button>
            `;

            app.innerHTML += detallesHTML;

            // Enviar la reseña cuando el usuario lo haga
            document.getElementById("reseñaForm").addEventListener("submit", (e) => {
                enviarResenia(idLibro);  // Llamamos a la función para enviar la reseña
            });

            document.getElementById("backButton").addEventListener("click", () => {
                sessionStorage.removeItem("idActual");
                loadHome();
            });
            document.getElementById("logoutButton").addEventListener("click", handleLogout);
        })
        .catch(error => console.error("Error al cargar los detalles del libro:", error));
    });
};

function enviarResenia(idLibro) {
    const puntuacion = document.querySelector('select[name="nota"]').value;
    const comentario = document.querySelector('textarea[name="texto"]').value;
    // Mostrar los datos antes de enviarlos
    console.log("Datos a enviar:", {
        id_libro: idLibro,
        puntuacion: puntuacion,
        comentario: comentario
    });
    fetch("backend/resenia.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id_libro: idLibro,
            puntuacion: puntuacion,
            comentario: comentario
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            loadLibroDetalles(idLibro); // Volver a cargar los detalles del libro para ver la reseña nueva
        } else {
            alert("Error: " + data.message); // Mensaje de error
        }
    })
    .catch(error => {
        console.error("Error al enviar la reseña:", error);
        alert("Hubo un problema al enviar tu reseña.");
    });
};

checkSession();