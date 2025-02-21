<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['tipo_pista'], $_POST['precio'], $_POST['poli']) && !empty($_POST['tipo_pista']) && !empty($_POST['precio']) 
        && !empty($_POST['poli'])){
            require_once('../modelo/pista.php');
    
            $pista = new Pista($_POST['tipo_pista'], "Disponible", $_POST['precio'], $_POST['poli']);
    
            if ($pista->registrarPista()) {
                $_SESSION['msg'] = "La pista se ha registrado correctamente.";
                header('Location: ../vista/vistaAdmin.php');
                exit();
            } else {
                $_SESSION['msg'] = "Ha habido un error al registrar la pista.";
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