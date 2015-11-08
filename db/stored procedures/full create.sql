USE db_andresleondoylet;

DROP PROCEDURE IF EXISTS INSERTA_MODIFICA_CATEGORIA;
DROP PROCEDURE IF EXISTS INSERTA_MODIFICA_ETIQUETA;
DROP PROCEDURE IF EXISTS INSERTA_CONTACTO;

DELIMITER $$
CREATE PROCEDURE INSERTA_MODIFICA_CATEGORIA (INOUT p_id_categoria INT,
IN p_descripcion VARCHAR(50), IN p_estado BIT)
BEGIN
	IF id_categoria IS NULL THEN
		INSERT INTO tb_categoria (descripcion, estado) VALUES (p_descripcion, p_estado);
        SET p_id_categoria = last_insert_id();
	ELSE
		UPDATE tb_categoria SET descripcion = p_descripcion, estado = p_estado WHERE id_categoria = p_id_categoria;
	END IF;
END $$

DELIMITER $$
CREATE PROCEDURE INSERTA_MODIFICA_ETIQUETA (INOUT p_id_etiqueta INT, IN p_descripcion VARCHAR(50), IN p_estado BIT)
BEGIN
	IF p_id_etiqueta IS NULL THEN
		INSERT INTO tb_etiqueta VALUES (p_descripcion, p_estado);
        SET p_id_etiqueta = LAST_INSERT_ID();
	ELSE
		UPDATE tb_etiqueta SET descripcion = p_descripcion, estado = p_estado WHERE id_etiqueta = p_id_etiqueta;
	END IF;
END $$

CREATE PROCEDURE INSERTA_CONTACTO (IN p_nombre VARCHAR(50), IN p_correo_electronico_remitente VARCHAR(100), 
	IN p_asunto VARCHAR(50), IN p_telefono VARCHAR(10), IN p_mensaje VARCHAR(150),
	IN p_correo_electronico_destinatario VARCHAR(100))
BEGIN
	INSERT INTO tb_contacto (nombre, correo_electronico_remitente, asunto, telefono, mensaje,
		correo_electronico_destinatario, fecha_creacion) VALUES (p_nombre, p_correo_electronico_remitente, 
        p_asunto, p_telefono, p_mensaje, p_correo_electronico_destinatario, NOW());
END