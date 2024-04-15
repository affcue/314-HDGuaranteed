<?php
class ProfileController {
    private $userProfileEntity;

    public function __construct(UserProfile $profileEntity) {
        $this->userProfileEntity = $profileEntity;
    }

    public function displayUserProfile($raId) {
        return $this->userProfileEntity->getUserProfile($raId);
    }

    public function processProfileUpdate($raId, $postData) {
        $this->userProfileEntity->updateUserProfile($raId, $postData['name'], $postData['description'], $postData['email'], $postData['contact']);
    }
}
?>