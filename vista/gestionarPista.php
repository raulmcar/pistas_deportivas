<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css?v=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar bg-primary w-100 d-flex justify-content-between align-items-center" data-bs-theme="dark">
                <h1 class="text-warning mx-auto"> <?php echo "Bienvenido administrador: " . $_SESSION['usuario']; ?> </h1>
                <a href="../index.php" class="btn btn-secondary text-warning btn-lg m-3">Cerrar sesión</a>
                <a href="./vistaAdmin.php" class="btn btn-secondary text-warning btn-lg m-3">Volver al menú de admin</a>
            </nav>
        </div>
        <div class="row container">
            <table class="table mt-3 col-10 text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo de pista</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Polideportivo</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('../modelo/pista.php');
                $pistas = Pista::desplegarPistas();

                if(!empty($pistas)){
                    foreach($pistas as $pista){
                        echo "<tr>
                                <td>{$pista['id_pista']}</td>
                                <td>{$pista['tipo_pista']}</td>
                                <td>{$pista['estado']}</td>
                                <td>{$pista['precio']}</td>
                                <td>{$pista['id_polideportivo']}</td>
                                <td>
                                <form action='../controlador/gestionarPista.php' method='post'>
                                    <input type='hidden' name='id_pista_escondida' value={$pista['id_pista']}>
                                    <input type='submit' value='Eliminar'>
                                </form><br>
                                <form action='../vista/editarPista.php' method='post'>
                                    <input type='hidden' name='id_pista_escondida' value={$pista['id_pista']}>
                                    <input type='hidden' name='tipo_pista_escondida' value={$pista['tipo_pista']}>
                                    <input type='hidden' name='estado_escondido' value={$pista['estado']}>
                                    <input type='hidden' name='precio_escondido' value={$pista['precio']}>
                                    <input type='submit' value='Editar'>
                                </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<p>No hay pistas registradas</p>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>