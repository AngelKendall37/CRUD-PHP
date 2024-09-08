<?php
class UserModel {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        $this->db = new mysqli('localhost', 'root', '', 'prueba');
        if ($this->db->connect_error) {
            die("Error de conexión: " . $this->db->connect_error);
        }
    }

    // Obtener usuario por email
    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_assoc() : false;
    }

    // Registrar un nuevo usuario
    public function registerUser($username, $lastname, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $lastname, $email, $hashedPassword);
        return $stmt->execute();
    }
}
?>


