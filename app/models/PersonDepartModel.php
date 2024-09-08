<?php
class PersonDepartModel {
    private $db;

    public function __construct() {
        // Conexión usando PDO
        $this->db = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtener personas con sus departamentos
    public function getAllPersonsWithDepartments() {
        $query = "SELECT p.id, p.nombre, p.apellido, p.departamento_id, d.nombre AS departamento 
                  FROM personas p
                  INNER JOIN departamentos d ON p.departamento_id = d.id";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los departamentos
    public function getAllDepartments() {
        return $this->db->query("SELECT * FROM departamentos")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar persona
    public function addPerson($nombre, $apellido, $departamento_id) {
        $query = "INSERT INTO personas (nombre, apellido, departamento_id) VALUES (:nombre, :apellido, :departamento_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':departamento_id', $departamento_id);
        $stmt->execute();
    }

    // Actualizar persona
    public function updatePerson($id, $nombre, $apellido, $departamento_id) {
        $stmt = $this->db->prepare("UPDATE personas SET nombre = ?, apellido = ?, departamento_id = ? WHERE id = ?");
        return $stmt->execute([$nombre, $apellido, $departamento_id, $id]);
    }

    // Eliminar persona
    public function deletePerson($id) {
        $query = "DELETE FROM personas WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>



