<?php
// Edit_ProfileE.php

class UserProfile {
    protected $pdo;

    public function __construct(PDO $db) {
        $this->pdo = $db;
    }

    public function getUserData($userId) {
        $stmt = $this->pdo->prepare("SELECT id, name, description, email, contact FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserData($userId, $name, $description, $email, $contact) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, description = ?, email = ?, contact = ? WHERE id = ?");
        $stmt->execute([$name, $description, $email, $contact, $userId]);
        return $stmt->rowCount();
    }
}
?>
