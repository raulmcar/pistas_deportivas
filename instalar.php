<?php
    session_start();
    $usuario = "root";
    $password = "Furciademierda4";
    $host = "localhost";


    try {
        $bdConexion = new PDO("mysql:host=$host",$usuario,$password);
        
        $bdConexion->exec("CREATE DATABASE IF NOT EXISTS gestion_deportiva;");

        $bdConexion->exec("USE gestion_deportiva;");

        $bdConexion->beginTransaction();

        $bdConexion->exec("CREATE TABLE IF NOT EXISTS usuario(
            id_usuario INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(50),
            apellidos VARCHAR(100),
            email VARCHAR(100),
            contrasena VARCHAR(200),
            telefono INT(9),
            dni VARCHAR(9),
            fecha_nacimiento VARCHAR(10),
            tipo_usuario VARCHAR(10));");

        $bdConexion->exec("CREATE TABLE IF NOT EXISTS polideportivo(
            id_polideportivo INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            direccion VARCHAR(100),
            extension VARCHAR(20));");

        $bdConexion->exec("CREATE TABLE IF NOT EXISTS pista(
            id_pista INT PRIMARY KEY AUTO_INCREMENT,
            tipo_pista VARCHAR(50),
            estado VARCHAR(50),
            precio FLOAT(10),
            hora_ult_reserva VARCHAR(20),
            id_polideportivo INT(10));");

        $bdConexion->exec("CREATE TABLE IF NOT EXISTS reserva(
            id_reserva INT PRIMARY KEY AUTO_INCREMENT,
            fecha_reserva VARCHAR(20),
            fecha_uso VARCHAR(20),
            precio_total FLOAT(10),
            id_pista INT(10));");

        $bdConexion->exec("CREATE TABLE IF NOT EXISTS reserva_usuario(
            id_reserva_usuario INT PRIMARY KEY AUTO_INCREMENT,
            id_reserva INT(10),
            id_usuario INT(10));");

        $bdConexion->exec("ALTER TABLE pista ADD FOREIGN KEY(id_polideportivo)
            REFERENCES polideportivo(id_polideportivo) ON DELETE CASCADE;");

        $bdConexion->exec("ALTER TABLE reserva ADD FOREIGN KEY(id_pista)
            REFERENCES pista(id_pista) ON DELETE CASCADE;");

        $bdConexion->exec("ALTER TABLE reserva_usuario ADD FOREIGN KEY(id_reserva)
            REFERENCES reserva(id_reserva) ON DELETE CASCADE;");

        $bdConexion->exec("ALTER TABLE reserva_usuario ADD FOREIGN KEY(id_usuario)
            REFERENCES usuario(id_usuario) ON DELETE CASCADE;");

        $bdConexion->commit();
        $bdConexion = null;
        echo "Todo okay";
    }
    catch (PDOException $e) {
        $bdConexion->rollback();
        $bdConexion = null;
        echo "Error en la instalacion: " . $e->getMessage();
    }

?>