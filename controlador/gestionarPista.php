<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['id_pista_escondida']) && !empty($_POST['id_pista_escondida'])){
            require_once('../modelo/pista.php');

            if(Pista::eliminarPista($_POST['id_pista_escondida'])){
                $_SESSION['msg'] = "Se ha eliminado correctamente la pista.";
                header('Location: ../vista/vistaAdmin.php');
                exit();
            } else {
                $_SESSION['msg'] = "Ha habido un error a la hora de eliminar la pista.";
                header('Location: ../vista/vistaAdmin.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = "Alguno de los datos introducidos no es correcto.";
            header('Location: ../vista/vistaAdmin.php');
            exit();
        }
    }
?>