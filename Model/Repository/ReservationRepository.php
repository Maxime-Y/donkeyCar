<?php

require_once 'EntityRepository.php';


class ReservationRepository extends EntityRepository {

    public function __construct($pdo = null) {
        parent::__construct($pdo, 'reservation');
    }

    public function getByUserId($userId) {
        $statement = $this->pdo->prepare("
            SELECT 
                r.*, 
                a.name AS agency_name, 
                a.address AS agency_address, 
                a.phone AS agency_phone,
                v.brand AS vehicle_brand, 
                v.model AS vehicle_model, 
                v.year AS vehicle_year, 
                v.daily_Rate AS vehicle_daily_rate,
                v.image AS vehicle_image
            FROM 
                reservation r
                JOIN vehicle v ON r.vehicle_Id = v.id
                JOIN agency a ON v.agency_Id = a.id
            WHERE 
                r.user_id = :user_id
        ");
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addReservation($data) {
        // Assurez-vous que tous les champs nécessaires sont présents
        if (isset($data['user_Id'], $data['vehicle_Id'], $data['start_Date'], $data['end_Date'], $data['reservation_Nb'])) {
            // Utilisation de la méthode create héritée pour insérer les données
            return $this->create($data);
        } else {
            throw new InvalidArgumentException("Missing fields for reservation creation.");
        }
    }
    
    
}
