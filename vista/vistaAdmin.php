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
        </nav>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card m-2" style="width: 18rem;">
        <img src="../imagenes/polideportivo.jpg" class="card-img-top mt-2" alt="polideportivo">
            <div class="card-body">
                <h5 class="card-title">Polideportivos</h5>
                <p class="card-text">Con esta opción puedes ver los polideportivos, editar su información y añadir un polideportivo nuevo</p>
                <a href="./registrarPolideportivo.php" class="btn btn-primary">Registrar nuevo polideportivo</a>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
        <img src="../imagenes/pista.jpg" class="card-img-top mt-2" alt="polideportivo">
            <div class="card-body">
                <h5 class="card-title">Pistas</h5>
                <p class="card-text">También puedes añadir una nueva pista, editar la información de la pista o ver todas las pistas</p>
                <a href="./registrarPista.php" class="btn btn-primary">Registrar nueva pista</a>
                <a href="./gestionarPista.php" class="btn btn-primary mt-3">Gestionar pistas</a>
            </div>
        </div>
    </div>
</div>


    <?php
        if (isset($_SESSION['msg'])) {
            echo "<script>alert('" . $_SESSION['msg'] . "');</script>";
            unset($_SESSION['msg']);
        } 
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>