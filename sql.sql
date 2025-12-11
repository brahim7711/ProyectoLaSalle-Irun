CREATE DATABASE IF NOT EXISTS lsbm;

USE lsbm;

CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE empresas_autorizadas (
    id_autorizado INT AUTO_INCREMENT PRIMARY KEY,
    email_autorizado VARCHAR(255) NOT NULL UNIQUE
);
CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_autorizado INT NOT NULL UNIQUE,
    nombre_empresa VARCHAR(255) NOT NULL,
    descripcion TEXT NULL,
    logo_url VARCHAR(255) NULL,      
    web_url VARCHAR(255) NULL,       
    spot_url VARCHAR(255) NULL,      
    contacto_adicional VARCHAR(255) NULL, 
    horario VARCHAR(255) NULL,      
    meet_url VARCHAR(255) NULL,     
    FOREIGN KEY (id_autorizado) 
        REFERENCES empresas_autorizadas(id_autorizado)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE stands (
    stand_id VARCHAR(5) PRIMARY KEY,
    empresa_id INT NULL,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id) ON DELETE SET NULL,
    UNIQUE KEY (empresa_id) 
);

CREATE TABLE inscripciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    dni VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE votaciones(
    id INT AUTO_INCREMENT PRIMARY KEY,
    inscripcion_id INT NOT NULL,
    empresa_id INT NOT NULL,
    FOREIGN KEY (inscripcion_id) REFERENCES inscripciones(id) ON DELETE CASCADE,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id) ON DELETE CASCADE,
    UNIQUE KEY (inscripcion_id, empresa_id)
);

INSERT INTO stands (stand_id, empresa_id) VALUES
('A1', NULL), ('A2', NULL), ('A3', NULL), ('A4', NULL), ('A5', NULL), ('A6', NULL), ('A7', NULL), ('A8', NULL),
('B1', NULL), ('B2', NULL), ('B3', NULL), ('B4', NULL), ('B5', NULL), ('B6', NULL), ('B7', NULL), ('B8', NULL),
('C1', NULL), ('C2', NULL), ('C3', NULL), ('C4', NULL), ('C5', NULL), ('C6', NULL), ('C7', NULL), ('C8', NULL),
('D1', NULL), ('D2', NULL), ('D3', NULL), ('D4', NULL), ('D5', NULL), ('D6', NULL), ('D7', NULL), ('D8', NULL);

INSERT INTO administradores (email, password) VALUES
('2026lsbm@gmail.com', 'a6dc7bba71049f8d7b24de7cca878ddbbd53bdad36506aa162c93d4fc8a578ad');

INSERT INTO empresas_autorizadas (email_autorizado) VALUES
('fashioncolasalle@gmail.com'),
('epiworks.sefed@lasalleinstitucion.es'),
('zapalduinfo@gmail.com'),
('aulki.info@gmail.com'),
('lorearteanirun@gmail.com'),
('greenykit.irun@gmail.com'),
('velocitycar.sefed@gmail.com'),
('sallelanbiltegiak.sefed@lsbikasleak.eus'),
('gising.2526@gmail.com'),
('fruitat@gmail.com'),
('Ironbites50@gmail.com'),
('sl.hemera@gmail.com'),
('tastetsdarreu@gmail.com'),
('nexalleida@gmail.com'),
('techcitylasalle@gmail.com'),
('reception@visualix.com'),
('reception@creamateria.com'),
('tecnusventas@lasallesagradocorazon.es'),
('empresasimnulada1@lasallesagradocorazon.es'),
('empresasimulada2@lasallesagradocorazon.es'),
('empresasimulada3@lasallesagradocorazon.es'),
('info.sallematsuministros@gmail.com'),
('paapeer.mmass.empresa@gmail.com'),
('fidesign.mundonuevo@gmail.com')