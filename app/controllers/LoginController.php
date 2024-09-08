<?php
// Controlador de login
class LoginController {
    
    public function showLoginForm() {
        require_once __DIR__ . '/../views/Login.php'; // Mostrar formulario de login
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once __DIR__ . '/../models/UserModel.php';
            $userModel = new UserModel();

            $user = $userModel->getUserByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: index.php?controller=menu&action=showMenu');
                exit();
            } else {
                $error = "Credenciales incorrectas";
                require_once __DIR__ . '/../views/Login.php';
            }
        } else {
            $this->showLoginForm();
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"]);
        }

        session_destroy();
        header('Location: index.php?controller=login&action=login');
        exit;
    }
}
?>




