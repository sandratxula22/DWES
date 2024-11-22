-- Script para crear y poblar la base de datos Reseñas de libros

CREATE DATABASE IF NOT EXISTS resenias_libros;
USE resenias_libros;

-- Tabla de usuarios
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Tabla de libros
CREATE TABLE Libros (
    id_libro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL
);

-- Tabla de resenias
CREATE TABLE Resenias (
    id_resena INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_libro INT NOT NULL,
    puntuacion INT NOT NULL,
    comentario TEXT,
    fecha VARCHAR
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (id_libro) REFERENCES Libros(id_libro)
);

-- Insertar datos en Usuarios
INSERT INTO Usuarios (email, password) VALUES
('usuario1@gmail.com', '1234'),
('usuario2@gmail.com', 'abcd'),
('usuario3@gmail.com', 'pass');

-- Insertar datos en Libros
INSERT INTO Libros (titulo, autor, categoria) VALUES
('El Señor de los Anillos: La Comunidad del Anillo', 'J.R.R. Tolkien', 'Fantasía'),
('1984', 'George Orwell', 'Distopía'),
('Juego de Tronos', 'George R.R. Martin', 'Fantasía'),
('Cien Años de Soledad', 'Gabriel García Márquez', 'Realismo Mágico'),
('Crónica de una Muerte Anunciada', 'Gabriel García Márquez', 'Drama'),
('El Alquimista', 'Paulo Coelho', 'Filosófico'),
('Los Pilares de la Tierra', 'Ken Follett', 'Histórico'),
('El Código Da Vinci', 'Dan Brown', 'Misterio'),
('Los Juegos del Hambre', 'Suzanne Collins', 'Distopía'),
('El Principito', 'Antoine de Saint-Exupéry', 'Filosófico');

-- Insertar datos en Resenias
INSERT INTO Resenias (id_usuario, id_libro, puntuacion, comentario, fecha) VALUES
(2, 1, 4, 'Interesante, aunque un poco largo.', '2024-11-02'),
(3, 1, 5, 'Un clásico imprescindible, me encantó.', '2024-11-03'),
(1, 2, 4, 'Increíble visión del futuro, me dejó pensando mucho.', '2024-11-04'),
(2, 2, 3, 'Un poco pesado, pero con ideas interesantes.', '2024-11-05'),
(3, 2, 4, 'Es una historia que te deja pensando sobre el mundo en que vivimos.', '2024-11-06'),
(1, 3, 5, 'Los personajes son súper interesantes y la trama engancha un montón', '2024-11-07'),
(3, 3, 4, 'Muy bueno, aunque algunos capítulos son densos.', '2024-11-09'),
(1, 4, 4, 'Una obra maestra, absolutamente recomendable.', '2024-11-10'),
(2, 4, 3, 'Interesante, aunque no es de mis favoritos.', '2024-11-11'),
(1, 5, 3, 'Gran narrativa, aunque esperaba algo más.', '2024-11-13'),
(2, 5, 4, 'Muy buena historia, me sorprendió.', '2024-11-14'),
(3, 5, 4, 'Me gustó, tiene un toque especial.', '2024-11-15'),
(1, 6, 4, 'Un libro muy inspirador, me gustó mucho.', '2024-11-16'),
(2, 7, 5, 'Una obra impresionante, me enganchó de principio a fin.', '2024-11-17'),
(3, 8, 3, 'Entretenido, pero esperaba un poco más de misterio.', '2024-11-18'),
(1, 9, 2, 'Un poco repetitivo, no cumplió mis expectativas.', '2024-11-19'),
(2, 10, 5, 'Un libro maravilloso, con una enseñanza muy profunda.', '2024-11-20');


