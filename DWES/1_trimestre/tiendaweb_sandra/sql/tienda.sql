CREATE DATABASE tienda_restaurantes;

USE tienda_restaurantes;

CREATE TABLE restaurantes(
    id_restaurante INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(255) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    direccion VARCHAR(255)
);

CREATE TABLE categorias(
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255)
);

CREATE TABLE productos(
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE pedidos(
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_restaurante INT,
    fecha_pedido DATE NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    enviado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id_restaurante) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE pedido_detallado(
    id_detalles INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_producto INT,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO categorias (nombre, descripcion) VALUES
('Ingredientes', 'Suministros alimenticios como carnes, verduras, y especias'),
('Bebidas', 'Suministros de bebidas alcohólicas y no alcohólicas para restaurantes'),
('Utensilios y Equipos', 'Utensilios de cocina y equipos para el restaurante'),
('Envoltorios', 'Materiales para empaquetar y servir comida'),
('Limpieza', 'Productos de limpieza y desinfección para el restaurante');

INSERT INTO productos (id_categoria, nombre, descripcion, precio, stock) VALUES
(1, 'Carne de Res (kg)', 'Carne de res fresca para preparar platos principales', 8.99, 200),
(1, 'Pollo Entero (kg)', 'Pollo entero fresco para deshuesar o cocinar completo', 5.49, 150),
(1, 'Verduras Variadas (kg)', 'Mezcla de verduras frescas para guisos y ensaladas', 2.99, 300),
(1, 'Pasta (kg)', 'Pasta de trigo para preparar platillos italianos', 1.49, 500),
(1, 'Arroz (kg)', 'Arroz de grano largo, ideal para acompañamientos', 1.29, 400),
(2, 'Cerveza (500ml)', 'Cerveza de marca premium', 2.99, 100),
(2, 'Vino Tinto (750ml)', 'Vino tinto de calidad para acompañar comidas', 9.99, 80),
(2, 'Coca-Cola (500ml)', 'Bebida refrescante sabor cola', 1.49, 250),
(2, 'Zumo de Naranja Natural (1L)', 'Zumo de naranja natural y fresco', 3.49, 180),
(3, 'Sartén Profesional', 'Sartén de alta calidad para cocción rápida y uniforme', 25.99, 50),
(3, 'Cuchillo Chef', 'Cuchillo de acero inoxidable para cortes precisos', 18.99, 60),
(3, 'Horno Eléctrico', 'Horno eléctrico para cocción de pan y pizzas', 199.99, 10),
(3, 'Freidora de Aceite', 'Freidora eléctrica para patatas fritas y otros alimentos', 150.00, 15),
(4, 'Cajas para Pizza (Tamaño Grande)', 'Cajas de cartón para entrega de pizzas', 0.50, 500),
(4, 'Vasos Plásticos (500ml)', 'Vasos desechables de plástico para bebidas', 0.10, 1000),
(4, 'Bolsas de Plástico (Medianas)', 'Bolsas plásticas para llevar comida', 0.05, 1200),
(4, 'Papel Film', 'Papel plástico para envolver alimentos', 1.99, 350),
(5, 'Desinfectante Multisuperficies', 'Desinfectante para limpieza de superficies en la cocina', 3.49, 100),
(5, 'Jabón Líquido para Manos', 'Jabón líquido para lavar manos en la cocina', 2.49, 200),
(5, 'Cloro Industrial', 'Cloro para la limpieza profunda de áreas y utensilios', 5.99, 80);
