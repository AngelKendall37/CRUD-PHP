<?php
session_start();

require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/RegisterController.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../app/controllers/PersonDepartController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'login':
        $loginController = new LoginController();
        if ($action == 'login') {
            $loginController->login();
        } elseif ($action == 'showLoginForm') {
            $loginController->showLoginForm();
        }
        break;

    case 'register':
        $registerController = new RegisterController();
        if ($action == 'register') {
            $registerController->register();
        } elseif ($action == 'showRegisterForm') {
            $registerController->showRegisterForm();
        }
        break;

    case 'menu':
        $menuController = new MenuController();
        if ($action == 'showMenu') {
            $menuController->showMenu();
        } elseif ($action == 'addMenuItem') {
            $menuController->addMenuItem();
        } elseif ($action == 'updateMenuItem') {
            $menuController->updateMenuItem();
        } elseif ($action == 'deleteMenuItem') {
            $menuController->deleteMenuItem();
        } elseif ($action == 'logout') {
            $menuController->logout();
        }
        break;

    case 'persondepart':
        $personDepartController = new PersonDepartController();
        if ($action == 'showAll') {
            $personDepartController->showAll();
        } elseif ($action == 'addPerson') {
            $personDepartController->addPerson();
        } elseif ($action == 'deletePerson') {
            $personDepartController->deletePerson();
        } elseif ($action == 'updatePerson') {
            $personDepartController->updatePerson();
        }
        break;

    default:
        echo "Controlador no encontrado.";
        break;
}
?>