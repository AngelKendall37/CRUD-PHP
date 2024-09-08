<?php
// Controlador para manejar el registro de usuarios
class RegisterController {

    public function showRegisterForm() {
        require_once '../app/views/Register.php'; // Mostrar vista de registro
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once '../app/models/UserModel.php';
            $userModel = new UserModel();

            // Registrar usuario en la base de datos
            if ($userModel->registerUser($username, $lastname, $email, $password)) {
                header('Location: index.php?controller=login&action=showLoginForm');
                exit();
            } else {
                $error = "Error al registrar usuario.";
                require_once '../app/views/Register.php';
            }
        } else {
            $this->showRegisterForm(); // Mostrar formulario si no es POST
        }
    }
}
?>
