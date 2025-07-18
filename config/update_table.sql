-- Agregar campos nombre y apellido a la tabla users si no existen
USE login;

-- Verificar si la columna nombre existe, si no, agregarla
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE TABLE_SCHEMA = 'login' 
     AND TABLE_NAME = 'users' 
     AND COLUMN_NAME = 'nombre') = 0,
    'ALTER TABLE users ADD COLUMN nombre VARCHAR(100) AFTER username',
    'SELECT "Columna nombre ya existe"'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verificar si la columna apellido existe, si no, agregarla
SET @sql = (SELECT IF(
    (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
     WHERE TABLE_SCHEMA = 'login' 
     AND TABLE_NAME = 'users' 
     AND COLUMN_NAME = 'apellido') = 0,
    'ALTER TABLE users ADD COLUMN apellido VARCHAR(100) AFTER nombre',
    'SELECT "Columna apellido ya existe"'
));
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Actualizar el usuario existente con datos de ejemplo
UPDATE users SET nombre = 'Arturo', apellido = 'León' WHERE username = 'arturo';

-- Mostrar la estructura actual de la tabla
DESCRIBE users; 