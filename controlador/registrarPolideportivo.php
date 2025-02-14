<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['nombrePolideportivo'], $_POST['direccion'], $_POST['extension']) && !empty($_POST['nombrePolideportivo']) && !empty($_POST['direccion'])) 
        && !empty($_POST['extension']) {
            require_once('../modelo/polideportivo.php');

            $polideportivo = new Polideportivo($_POST['nombrePolideportivo'], $_POST['direccion'], $_POST['extension']);

            if ($polideportivo->registrarPolideportivo()) {
                $_SESSION['msg'] = "El polideportivo se ha registrado correctamente.";
                header('Location: ../vista/vistaAdmin.php');
                exit();
            } else {
                $_SESSION['msg'] = "Ha habido un problema a la hora de registrar el polideportivo.";
                header('Location: ../vista/vistaAdmin.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = "Falta alguno de los datos.";
            header('Location: ../vista/vistaAdmin');
            exit();
        }
    }
?>