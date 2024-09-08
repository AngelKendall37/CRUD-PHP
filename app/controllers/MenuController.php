<?php
// Controlador para gestionar el menú
class MenuController
{
    private $menuModel;

    public function __construct()
    {
        require_once '../app/models/MenuModel.php';
        $this->menuModel = new MenuModel();
    }

    public function showMenu()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=login&action=login');
            exit;
        }
    
        $user_id = $_SESSION['user_id'];
        $menuItems = $this->menuModel->getMenuByUser($user_id);

        $menu = !empty($menuItems) ? $this->buildMenuHierarchy($menuItems) : [];
        require_once '../app/views/menu.php'; // Mostrar vista del menú
    }

    private function buildMenuHierarchy($menuItems)
    {
        $menu = [];
        $itemsById = [];

        foreach ($menuItems as $item) {
            $item['submenus'] = [];
            $itemsById[$item['id']] = $item;
        }

        foreach ($itemsById as $item) {
            if ($item['parent_id'] == null) {
                $menu[] = $item;
            } else {
                $itemsById[$item['parent_id']]['submenus'][] = $item;
            }
        }

        return $menu;
    }

    public function addMenuItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $url = $_POST['url'];
            $parentId = $_POST['parent_id'] ?? null;
            $orden = $_POST['orden'];

            $this->menuModel->addMenuItem($nombre, $url, $parentId, $orden);
            header('Location: index.php?controller=menu&action=showMenu');
        }
    }

    public function updateMenuItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $url = $_POST['url'];
            $parentId = $_POST['parent_id'] ?? null;
            $orden = $_POST['orden'];

            $this->menuModel->updateMenuItem($id, $nombre, $url, $parentId, $orden);
            header('Location: index.php?controller=menu&action=showMenu');
        }
    }

    public function deleteMenuItem()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $this->menuModel->deleteMenuItem($id);
            header('Location: index.php?controller=menu&action=showMenu');
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








