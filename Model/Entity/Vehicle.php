<?php

class Vehicle
{
    private int $id;
    private string $brand;
    private string $model;
    private int $year;
    private float $daily_Rate;
    private int $door_nb;
    private string $image;
    private string $type;
    private string $gear;
    private int $passenger_Nb;
    private string $energy_Type;
    private int $agency_Id;
    private int $availability;

   

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getBrand() : string
    {
        return $this->brand;
    }

    public function setBrand(string $brand) : void
    {
        $this->brand = $brand;
    }

    public function getModel() : string
    {
        return $this->model;
    }

    public function setModel(string $model) : void
    {
        $this->model = $model;
    }

    public function getYear() : int
    {
        return $this->year;
    }

    public function setYear(int $year) : void
    {
        $this->year = $year;
    }

    public function getDaily_Rate() : float
    {
        return $this->daily_Rate;
    }

    public function setDaily_Rate(float $daily_Rate) : void
    {
        $this->daily_Rate = $daily_Rate;
    }

    public function getDoor_nb() : int
    {
        return $this->door_nb;
    }

    public function setDoor_nb(int $door_nb) : void
    {
        $this->door_nb = $door_nb;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image) : void
    {
        $this->image = $image;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function setType(string $type) : void
    {
        $this->type = $type;
    }

    public function getGear() : string
    {
        return $this->gear;
    }

    public function setGear(string $gear) : void
    {
        $this->gear = $gear;
    }

    public function getPassenger_Nb() : int
    {
        return $this->passenger_Nb;
    }

    public function setPassenger_Nb(int $passenger_Nb) : void
    {
        $this->passenger_Nb = $passenger_Nb;
    }

    public function getEnergy_Type() : string
    {
        return $this->energy_Type;
    }

    public function setEnergy_Type(string $energy_Type) : void
    {
        $this->energy_Type = $energy_Type;
    }

    public function getAgency_Id() : int
    {
        return $this->agency_Id;
    }

    public function setAgency_Id(int $agency_Id) : void
    {
        $this->agency_Id = $agency_Id;
    }

    public function getAvailability() : int
    {
        return $this->availability;
    }

    public function setAvailability(int $availability) : void
    {
        $this->availability = $availability;
    }
}

?>

