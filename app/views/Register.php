<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <!-- Contenedor principal del formulario -->
    <div class="formulario-login">
        <h2>Registro de Usuario</h2>

        <!-- Formulario que envía los datos por POST para registrar usuario -->
        <form action="index.php?controller=register&action=register" method="POST">
            <!-- Grupo de entrada para el nombre -->
            <div class="input-group">
                <input type="text" id="username" name="username" required placeholder=" ">
                <label for="username">Nombre:</label>
            </div>

            <!-- Grupo de entrada para el apellido -->
            <div class="input-group">
                <input type="text" id="lastname" name="lastname" required placeholder=" ">
                <label for="lastname">Apellido:</label>
            </div>

            <!-- Grupo de entrada para el email -->
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder=" ">
                <label for="email">Email:</label>
            </div>

            <!-- Grupo de entrada para la contraseña -->
            <div class="input-group">
                <input type="password" id="password" name="password" required placeholder=" ">
                <label for="password">Contraseña:</label>
            </div>

            <!-- Botón de envío del formulario -->
            <button type="submit" class="btn-login">Registrar</button>
        </form>

        <!-- Sección para mostrar errores si existen -->
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>

        <!-- Enlace a la página de login si ya se tiene una cuenta -->
        <div class="registro">
            <p>¿Ya tienes una cuenta? 
                <a href="index.php?controller=login&action=showLoginForm">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
</body>
</html>

