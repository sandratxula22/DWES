INSERT INTO categorias (id, name, created_at, updated_at) VALUES
(1, 'Electrónica', NOW(), NOW()),
(2, 'Moda', NOW(), NOW()),
(3, 'Hogar', NOW(), NOW()),
(4, 'Deportes', NOW(), NOW()),
(5, 'Juguetes', NOW(), NOW()),
(6, 'Automóviles', NOW(), NOW()),
(7, 'Salud y Belleza', NOW(), NOW()),
(8, 'Alimentación', NOW(), NOW()),
(9, 'Libros', NOW(), NOW()),
(10, 'Tecnología', NOW(), NOW());


INSERT INTO chollos (titulo, descripcion, url, categoria_id, puntuacion, precio, precio_descuento, disponible, created_at, updated_at) VALUES
-- Electrónica
('iPhone 14 Pro', 'Último modelo de iPhone con pantalla OLED y triple cámara.', 'https://ejemplo.com/iphone-14-pro', 1, 4.9, 1299.99, 1099.99, 1, NOW(), NOW()),
('Samsung Galaxy Watch 5', 'Smartwatch con sensor de salud avanzado y batería de larga duración.', 'https://ejemplo.com/galaxy-watch5', 1, 4.7, 299.99, 249.99, 1, NOW(), NOW()),
('Auriculares Sony WH-1000XM4', 'Auriculares con cancelación de ruido líder en el mercado.', 'https://ejemplo.com/sony-wh1000xm4', 1, 4.8, 349.99, 279.99, 1, NOW(), NOW()),

-- Moda
('Zapatillas Adidas Ultraboost', 'Zapatillas deportivas con amortiguación superior.', 'https://ejemplo.com/adidas-ultraboost', 2, 4.6, 180.00, 129.99, 1, NOW(), NOW()),
('Chaqueta North Face', 'Chaqueta térmica ideal para climas fríos.', 'https://ejemplo.com/north-face-chaqueta', 2, 4.5, 220.00, 169.99, 1, NOW(), NOW()),
('Gafas de sol Ray-Ban', 'Clásico diseño con protección UV.', 'https://ejemplo.com/rayban', 2, 4.7, 150.00, 119.99, 1, NOW(), NOW()),

-- Hogar
('Aspiradora Dyson V11', 'Aspiradora sin cable con potente succión.', 'https://ejemplo.com/dyson-v11', 3, 4.9, 599.99, 499.99, 1, NOW(), NOW()),
('Cafetera Nespresso Vertuo', 'Cafetera automática con espumador de leche.', 'https://ejemplo.com/nespresso-vertuo', 3, 4.6, 199.99, 149.99, 1, NOW(), NOW()),
('Colchón viscoelástico Emma', 'Colchón con tecnología ergonómica.', 'https://ejemplo.com/emma-colchon', 3, 4.8, 450.00, 349.99, 1, NOW(), NOW()),

-- Deportes
('Bicicleta MTB Rockrider', 'Bicicleta de montaña con cambios Shimano.', 'https://ejemplo.com/mtb-rockrider', 4, 4.5, 499.99, 399.99, 1, NOW(), NOW()),
('Raqueta de tenis Babolat', 'Raqueta ligera y resistente.', 'https://ejemplo.com/babolat', 4, 4.6, 120.00, 89.99, 1, NOW(), NOW()),
('Balón de fútbol Adidas', 'Balón oficial de la liga profesional.', 'https://ejemplo.com/adidas-balon', 4, 4.7, 60.00, 39.99, 1, NOW(), NOW()),

-- Juguetes
('LEGO Star Wars Millennium Falcon', 'Set LEGO detallado del Millennium Falcon.', 'https://ejemplo.com/lego-falcon', 5, 4.9, 159.99, 129.99, 1, NOW(), NOW()),
('Muñeca Barbie Dreamhouse', 'Casa de muñecas con accesorios.', 'https://ejemplo.com/barbie-dreamhouse', 5, 4.7, 199.99, 149.99, 1, NOW(), NOW()),
('Pista Hot Wheels', 'Circuito de carreras con loops y lanzadores.', 'https://ejemplo.com/hotwheels', 5, 4.6, 79.99, 59.99, 1, NOW(), NOW()),

-- Automóviles
('GPS Garmin DriveSmart', 'Navegador GPS con actualizaciones de mapas.', 'https://ejemplo.com/garmin-gps', 6, 4.5, 250.00, 199.99, 1, NOW(), NOW()),
('Compresor portátil Michelin', 'Inflador de neumáticos rápido y eficiente.', 'https://ejemplo.com/michelin-compresor', 6, 4.6, 80.00, 59.99, 1, NOW(), NOW()),
('Cámara trasera para coche', 'Sistema de asistencia para aparcamiento.', 'https://ejemplo.com/camara-coche', 6, 4.7, 120.00, 89.99, 1, NOW(), NOW()),

-- Salud y Belleza
('Secador Dyson Supersonic', 'Secador de pelo con motor digital.', 'https://ejemplo.com/dyson-secador', 7, 4.8, 399.99, 319.99, 1, NOW(), NOW()),
('Cepillo de dientes eléctrico Oral-B', 'Cepillo con tecnología de limpieza profunda.', 'https://ejemplo.com/oralb', 7, 4.7, 150.00, 99.99, 1, NOW(), NOW()),
('Pack de cremas La Roche-Posay', 'Tratamiento hidratante para piel sensible.', 'https://ejemplo.com/la-roche', 7, 4.6, 70.00, 49.99, 1, NOW(), NOW()),

-- Alimentación
('Lote de ibéricos', 'Jamón, chorizo y lomo ibérico de alta calidad.', 'https://ejemplo.com/ibericos', 8, 4.9, 129.99, 99.99, 1, NOW(), NOW()),
('Cafetera italiana Bialetti', 'Cafetera clásica para espresso.', 'https://ejemplo.com/bialetti', 8, 4.8, 45.00, 34.99, 1, NOW(), NOW()),
('Pack de cervezas artesanales', 'Selección de cervezas de distintos sabores.', 'https://ejemplo.com/cervezas', 8, 4.7, 35.00, 24.99, 1, NOW(), NOW()),

-- Libros
('El código Da Vinci - Dan Brown', 'Edición especial del bestseller.', 'https://ejemplo.com/codigo-da-vinci', 9, 4.9, 25.00, 19.99, 1, NOW(), NOW()),
('1984 - George Orwell', 'Novela distópica de referencia.', 'https://ejemplo.com/1984', 9, 4.8, 18.00, 14.99, 1, NOW(), NOW()),
('El Señor de los Anillos', 'Trilogía completa en edición especial.', 'https://ejemplo.com/lotr', 9, 4.9, 60.00, 49.99, 1, NOW(), NOW()),

-- Tecnología
('Portátil Lenovo ThinkPad', 'Laptop con procesador i7 y 16GB RAM.', 'https://ejemplo.com/lenovo-thinkpad', 10, 4.8, 1200.00, 999.99, 1, NOW(), NOW()),
('Monitor gaming LG 27”', 'Monitor con 144Hz y 1ms de respuesta.', 'https://ejemplo.com/lg-monitor', 10, 4.7, 350.00, 279.99, 1, NOW(), NOW()),
('Teclado mecánico Razer', 'Teclado RGB con switches ópticos.', 'https://ejemplo.com/razer-teclado', 10, 4.6, 120.00, 99.99, 1, NOW(), NOW());
