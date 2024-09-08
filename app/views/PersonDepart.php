<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas y Departamentos</title>
    <link rel="stylesheet" href="/public/css/crud.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Personas y Departamentos</h1>

    <!-- Formulario para agregar una persona -->
    <h2>Agregar Persona</h2>
    <form id="addPersonForm">
        <!-- Campos para nombre y apellido, con validación requerida -->
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>

        <!-- Selección del departamento, utilizando datos dinámicos desde PHP -->
        <select name="departamento_id" required>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?php echo htmlspecialchars($departamento['id']); ?>">
                    <?php echo htmlspecialchars($departamento['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Botón para agregar persona -->
        <button type="submit">Agregar</button>
    </form>

    <!-- Tabla que lista las personas -->
    <h2>Listado de Personas</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="personList">
            <!-- Generación dinámica de filas con personas desde PHP -->
            <?php foreach ($data as $person): ?>
                <tr>
                    <td><?php echo htmlspecialchars($person['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($person['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($person['departamento']); ?></td>
                    <td>
                        <!-- Botón para editar, con datos almacenados en los atributos data-* -->
                        <button class="edit-button" 
                           data-id="<?php echo htmlspecialchars($person['id']); ?>" 
                           data-nombre="<?php echo htmlspecialchars($person['nombre']); ?>" 
                           data-apellido="<?php echo htmlspecialchars($person['apellido']); ?>" 
                           data-departamento_id="<?php echo htmlspecialchars($person['departamento_id']); ?>">
                            Editar
                        </button>

                        <!-- Botón para eliminar con un ícono de FontAwesome -->
                        <button class="delete-button" 
                           onclick="window.location.href='index.php?controller=persondepart&action=deletePerson&id=<?php echo htmlspecialchars($person['id']); ?>'">
                            <i class="fas fa-trash"></i> <!-- Ícono de papelera -->
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Overlay para modal -->
    <div id="overlay"></div>

    <!-- Modal para editar persona -->
    <div id="editModal">
        <h2>Editar Persona</h2>
        <form id="editPersonForm">
            <!-- Campos oculto para el ID, y campos editables para nombre y apellido -->
            <input type="hidden" name="id" id="edit-id">
            <input type="text" name="nombre" id="edit-nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" id="edit-apellido" placeholder="Apellido" required>
            
            <!-- Lista de departamentos en el modal de edición -->
            <select name="departamento_id" id="edit-departamento_id" required>
                <?php foreach ($departamentos as $departamento): ?>
                    <option value="<?php echo htmlspecialchars($departamento['id']); ?>">
                        <?php echo htmlspecialchars($departamento['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Botón para actualizar y cancelar -->
            <button type="submit">Actualizar</button>
            <button type="button" onclick="closeEditModal()">Cancelar</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Función AJAX para agregar persona
            $('#addPersonForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'index.php?controller=persondepart&action=addPerson',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Respuesta del servidor:', response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            // Mostrar el modal de edición con los datos de la persona seleccionada
            $(document).on('click', '.edit-button', function() {
                $('#edit-id').val($(this).data('id'));
                $('#edit-nombre').val($(this).data('nombre'));
                $('#edit-apellido').val($(this).data('apellido'));
                $('#edit-departamento_id').val($(this).data('departamento_id'));
                $('#overlay').show();
                $('#editModal').show();
            });

            // Función AJAX para editar persona
            $('#editPersonForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'index.php?controller=persondepart&action=updatePerson',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Respuesta del servidor:', response);
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            location.reload();
                            closeEditModal();
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            // Función para cerrar el modal de edición
            window.closeEditModal = function() {
                $('#overlay').hide();
                $('#editModal').hide();
            };

            // Cerrar el modal al hacer clic en el overlay
            $('#overlay').click(function() {
                closeEditModal();
            });
        });
    </script>

    <!-- Enlaces a otras secciones del sistema -->
    <div>
        <a href="index.php?controller=menu&action=showMenu">Menu dinámico</a>
        <a href="index.php?controller=menu&action=logout">Cerrar Sesión</a>
    </div>
</body>
</html>






