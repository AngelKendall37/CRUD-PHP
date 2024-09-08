<?php
class MenuModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos con PDO
        $this->db = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtener ítems del menú
    public function getMenuItems() {
        $stmt = $this->db->prepare("SELECT * FROM menu ORDER BY orden");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener menú para usuario logueado
    public function getMenuByUser($user_id) {
        $query = "SELECT * FROM menu WHERE user_id = :user_id OR user_id IS NULL ORDER BY orden";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener submenús
    public function getSubMenus($parent_id) {
        $query = "SELECT * FROM menu WHERE parent_id = :parent_id ORDER BY orden";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar ítem de menú
    public function addMenuItem($nombre, $url, $parentId, $orden) {
        $query = "INSERT INTO menu (nombre, url, parent_id, orden) VALUES (:nombre, :url, :parent_id, :orden)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':parent_id', $parentId);
        $stmt->bindParam(':orden', $orden);
        return $stmt->execute();
    }

    // Actualizar ítem de menú
    public function updateMenuItem($id, $nombre, $url, $parentId, $orden) {
        $query = "UPDATE menu SET nombre = :nombre, url = :url, parent_id = :parent_id, orden = :orden WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':parent_id', $parentId);
        $stmt->bindParam(':orden', $orden);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Eliminar ítem de menú
    public function deleteMenuItem($id) {
        $query = "DELETE FROM menu WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>




