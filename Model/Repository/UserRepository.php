<?php

require_once 'EntityRepository.php';

class UserRepository extends EntityRepository {

    public function __construct($pdo = null)
    {
        parent::__construct($pdo, "user");
    }

    public function createUser(array $data): bool
    {
        return $this->create($data);
    }
    
    public function findUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `{$this->table}` WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserById($id) {
        $sql = "SELECT * FROM `{$this->table}` WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   
}



