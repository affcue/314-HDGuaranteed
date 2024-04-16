<?php
// My_ListingsE.php

class Listings {
    protected $pdo;

    public function __construct(PDO $db) {
        $this->pdo = $db;
    }

    public function getAgentListings($raId) {
        $stmt = $this->pdo->prepare("SELECT listing_id, type, location, price, rooms, size, region FROM listing WHERE ra_id = ?");
        $stmt->execute([$raId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListingById($raId, $listingId) {
        $stmt = $this->pdo->prepare("SELECT * FROM listing WHERE listing_id = ? AND ra_id = ?");
        $stmt->execute([$listingId, $raId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteListing($raId, $listingId) {
        $stmt = $this->pdo->prepare("DELETE FROM listing WHERE listing_id = ? AND ra_id = ?");
        $stmt->execute([$listingId, $raId]);
        return $stmt->rowCount();
    }

    public function updateListing($listingId, $raId, $type, $location, $price, $rooms, $size, $region) {
        $stmt = $this->pdo->prepare("UPDATE listing SET type = ?, location = ?, price = ?, rooms = ?, size = ?, region = ? WHERE listing_id = ? AND ra_id = ?");
        $stmt->execute([$type, $location, $price, $rooms, $size, $region, $listingId, $raId]);
        return $stmt->rowCount();
    }
}
?>
