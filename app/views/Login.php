<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <!-- Contenedor del formulario de login -->
    <div class="formulario-login">
        <h2>Login</h2>
        <!-- Formulario para login, que envía los datos al controlador de login vía método POST -->
        <form action="index.php?controller=login&action=login" method="POST">
            <!-- Grupo de entrada para el email -->
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder=" "> 
                <!-- Etiqueta flotante para el email -->
                <label for="email">Email:</label>
            </div>

            <!-- Grupo de entrada para la contraseña -->
            <div class="input-group">
                <input type="password" id="password" name="password" required placeholder=" ">
                <label for="password">Contraseña:</label>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>

        <!-- Mostrar mensaje de error si hay un problema en el login -->
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>

        <!-- Enlace para el registro de usuarios nuevos -->
        <div class="registro">
            <p>¿No tienes una cuenta? <a href="index.php?controller=register&action=showRegisterForm">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>



