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
            <h3 class="text-warning mx-auto"> <?php echo "Estas añadiendo un polideportivo, administrador: " . $_SESSION['usuario']; ?> </h3>
            <a href="../index.php" class="btn btn-secondary text-warning btn-lg m-3">Cerrar sesión</a>
            <a href="./vistaAdmin.php" class="btn btn-secondary text-warning btn-lg m-3">Volver al menú de admin</a>
        </nav>
    </div>
    <div class="row d-flex justify-content-center mt-5">
    <form class="col-4 mt-5 p-3 rounded bg-dark bg-gradient" action="../controlador/registrarPolideportivo.php" method="post">
        <div class="mb-3">
            <label class="form-label text-warning">Nombre del polideportivo</label>
            <input type="text" name="nombrePolideportivo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label text-warning">Direccion</label>
            <input type="text" name="direccion" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label text-warning">Extension en hectáreas</label>
            <input type="text" name="extension" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Regsitrar polideportivo</button>
    </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>