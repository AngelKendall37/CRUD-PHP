<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Menú</title>
    <link rel="stylesheet" href="/public/css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header Navigation -->
    <div class="header">
        <div class="header-left">
            <a href="index.php?controller=persondepart&action=showAll">Crud</a>
        </div>
        <div class="header-right">
            <a href="index.php?controller=menu&action=logout">Cerrar Sesión</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Gestionar Menú</h2>
        <div class="menu-container">
            <!-- Left Section: Form to Add New Menu Item -->
            <div class="left-section">
                <h3>Agregar nuevo elemento al menú</h3>
                <form action="index.php?controller=menu&action=addMenuItem" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>

                    <label for="url">URL:</label>
                    <input type="text" name="url" required>

                    <label for="parent_id">Parent ID (si es submenú):</label>
                    <input type="number" name="parent_id">

                    <label for="orden">Orden:</label>
                    <input type="number" name="orden" required>

                    <button type="submit">Agregar</button>
                </form>
            </div>

            <!-- Right Section: Current Menu Items -->
            <div class="right-section">
                <h3>Elementos actuales del menú</h3>
                <ul>
                    <?php foreach ($menu as $item) { ?>
                        <li>
                            <a href="<?php echo $item['url']; ?>"><?php echo $item['nombre']; ?></a>

                            <!-- Submenús -->
                            <?php if (!empty($item['submenus'])) { ?>
                                <ul>
                                    <?php foreach ($item['submenus'] as $submenu) { ?>
                                        <li><a href="<?php echo $submenu['url']; ?>"><?php echo $submenu['nombre']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Formulario para actualizar el menú -->
                            <form action="index.php?controller=menu&action=updateMenuItem" method="POST">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <input type="text" name="nombre" value="<?php echo $item['nombre']; ?>">
                                <input type="text" name="url" value="<?php echo $item['url']; ?>">
                                <input type="number" name="parent_id" value="<?php echo $item['parent_id']; ?>">
                                <input type="number" name="orden" value="<?php echo $item['orden']; ?>">
                                <button type="submit" class="update-button">Actualizar</button>
                            </form>

                            <!-- Formulario para eliminar el menú -->
                            <form action="index.php?controller=menu&action=deleteMenuItem" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="delete-button"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>





