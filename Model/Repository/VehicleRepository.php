<?php

require_once 'EntityRepository.php';

class VehicleRepository extends EntityRepository
{
    public function __construct($pdo = null)
    {
        parent::__construct($pdo, "vehicle");
    }

    public function getVehicleAvailable()
    {
        $statement = $this->pdo->prepare("SELECT * 
        FROM vehicle 
        WHERE availability = 1 
        AND agency_Id = :agencyStart
        AND id NOT IN (
            SELECT vehicle_Id 
            FROM reservation 
            WHERE (
                (start_Date BETWEEN :start_Date AND :end_Date) OR
                (end_Date BETWEEN :start_Date AND :end_Date) OR
                (:start_Date BETWEEN start_Date AND end_Date) OR
                (:end_Date BETWEEN start_Date AND end_Date)
            ) AND user_Id IS NOT NULL
        );
        ");
        $statement->bindParam(":agencyStart", $_POST['agencyStart'], PDO::PARAM_INT);
        $statement->bindParam(":start_Date", $_POST['start_Date'], PDO::PARAM_STR);
        $statement->bindParam(":end_Date", $_POST['end_Date'], PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function getCurrentDate(): string
    {
        $date = new DateTime();
        return $date->format('Y-m-d');
    }
}