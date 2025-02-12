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
    <div class="container w-100 d-flex justify-content-end rounded">
        <form id="formulario" class="col-4 mt-5 p-3 rounded bg-dark bg-gradient" action="../controlador/iniciarSesion.php" method="post">
            <div class="mb-2">
                <label class="form-label text-warning">Correo electrónico</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-2">
                <label class="form-label text-warning">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control">
                <button type="button" class="form-control btn btn-primary text-warning mt-2" onclick="mostrarContrasena()">Ver contraseña</button>
            </div>
            <div class="mb-2 pt-4">
                <input type="submit" name="iniciar" value="Iniciar Sesion" class="form-control btn btn-primary text-warning">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function mostrarContrasena() {
            const passwordInput = document.getElementById('contrasena');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>