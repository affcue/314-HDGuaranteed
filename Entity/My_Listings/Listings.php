<?php
class Listings {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getListingsByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM listings WHERE user_id = :userId");
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
