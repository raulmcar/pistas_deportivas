<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css?v=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container w-100 d-flex justify-content-end rounded">
        <form id="formulario" class="col-4 mt-5 p-3 rounded bg-dark bg-gradient" action="./controlador/registrarUsuario.php" method="post">
            <div class="mb-2">
                <label class="form-label text-warning">Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Apellidos</label>
                <input type="text" name="apellidos" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Correo electrónico</label>
                <input type="email" class="form-control" name="email">
                <div id="emailHelp" class="form-text text-warning">Tranqui, no vamos a compartir tu correo con nadie.</div>
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Contraseña</label>
                <input type="password" id="contrasena1" name="contrasena" class="form-control">
                <button type="button" class="form-control btn btn-primary text-warning mt-2" onclick="mostrarContrasena1()">Ver contraseña</button>
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Repite la contraseña</label>
                <input type="password" id="contrasena2" name="contrasena2" class="form-control">
                <button type="button" class="form-control btn btn-primary text-warning mt-2" onclick="mostrarContrasena2()">Ver contraseña</button>
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Teléfono</label>
                <input type="number" name="telefono" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">DNI</label>
                <input type="text" name="dni" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control">
            </div>
            <div class="mb-2 pt-3">
                <input type="submit" name="registrarme" value="Registrarme" class="form-control btn btn-primary text-warning">
            </div>
            <div class="text-center mt-4 text-warning">
                <span>¿Ya tienes cuenta? </span>
                <a href="./vista/iniciarSesion.php" class="text-primary fw-bold text-warning">Inicia sesión</a>
            </div>
        </form>
    </div>

    <?php
        if (isset($_SESSION['msg'])) {
            echo "<script>alert('" . $_SESSION['msg'] . "');</script>";
            unset($_SESSION['msg']);
        } 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function mostrarContrasena1() {
            const passwordInput = document.getElementById('contrasena1');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        function mostrarContrasena2() {
            const passwordInput = document.getElementById('contrasena2');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>

</body>
</html>