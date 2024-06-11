<?php

class User {
    
    private int $id;
    private string $username;
    private string $email;
    private string $phone;
    private string $address;
    private string $password;
    private string $firstName;
    private string $lastName;

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function setUsername(string $username) : void {
        $this->username = $username;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    public function getPhone() : string {
        return $this->phone;
    }

    public function setPhone(string $phone) : void {
        $this->phone = $phone;
    }

    public function getAddress() : string {
        return $this->address;
    }

    public function setAddress(string $address) : void {
        $this->address = $address;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function setPassword(string $password) : void {
        $this->password = $password;
    }

    public function getFirstName() : string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName) : void {
        $this->firstName = $firstName;
    }

    public function getLastName() : string {
        return $this->lastName;
    }

    public function setLastName(string $lastName) : void {
        $this->lastName = $lastName;
    }
}

?>
