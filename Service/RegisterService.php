<?php

require_once __DIR__ . '/../Model/Repository/UserRepository.php';

class RegisterService {
    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

public function register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $passwordConfirm = $_POST['password_confirm'];


            $result = $this->userRepository->createUser([
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'password' => $password,
                'firstname' => $firstName,
                'lastname' => $lastName
            ]);

            if ($result) {
                header('Location: index.php?page=home');
                exit();
            } else {
                // Gérer l'échec de l'insertion ici
                echo "Erreur lors de l'enregistrement.";
            }
        }
    }
}