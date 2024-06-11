<?php

class Reservation {
    private int $id;
    private int $client_Id;
    private int $vehicle_Id;
    private DateTime $start_Date;
    private DateTime $end_Date;
    private float $total_Price;
    private string $reservation_Nb; 
    private int $pickup_agency_id;
    private int $return_agency_id;      


    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getClient_Id() : int
    {
        return $this->client_Id;
    }

    public function setClient_Id(int $client_Id) : void
    {
        $this->client_Id = $client_Id;
    }

    public function getVehicle_Id() : int
    {
        return $this->vehicle_Id;
    }

    public function setVehicle_Id(int $vehicle_Id) : void
    {
        $this->vehicle_Id = $vehicle_Id;
    }

    public function getStart_Date() : DateTime
    {
        return $this->start_Date;
    }

    public function setStart_Date(DateTime $start_Date) : void
    {
        $this->start_Date = $start_Date;
    }

    public function getEnd_Date() : DateTime
    {
        return $this->end_Date;
    }

    public function setEnd_Date(DateTime $end_Date) : void
    {
        $this->end_Date = $end_Date;
    }

    public function getTotal_Price() : float
    {
        return $this->total_Price;
    }

    public function setTotal_Price(float $total_Price) : void
    {
        $this->total_Price = $total_Price;
    }

    public function getReservation_Nb() : string
    {
        return $this->reservation_Nb;
    }

    public function setReservation_Nb(string $reservation_Nb) : void
    {
        $this->reservation_Nb = $reservation_Nb;
    }

    public function getPickup_agency_id() : int
    {
        return $this->pickup_agency_id;
    }

    public function setPickup_agency_id(int $pickup_agency_id) : void
    {
        $this->pickup_agency_id = $pickup_agency_id;
    }

    public function getReturn_agency_id() : int
    {
        return $this->return_agency_id;
    }

    public function setReturn_agency_id(int $return_agency_id) : void
    {
        $this->return_agency_id = $return_agency_id;
    }
}
?>

