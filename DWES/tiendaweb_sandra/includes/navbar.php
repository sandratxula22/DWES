<?php
//Sandra Pico Álvarez
//navbar para incluir en las páginas
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a1b9a;">
    <a class="navbar-brand"><?php echo $_SESSION['user']; ?></a>
     <!-- Botón collapse para dispositivos pequeños -->
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="home.php">Home</a>
        <a class="nav-item nav-link" href="carrito.php">Carrito</a>
        <a class="nav-item nav-link" href="log_out.php">Cerrar sesión</a>
      </div>
    </div>
</nav>