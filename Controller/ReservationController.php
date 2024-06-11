<?php
require_once __DIR__ . '../../Model/Repository/ReservationRepository.php';
require_once __DIR__ . '../../Model/Repository/EntityRepository.php';


class ReservationController
{

    private $reservationRepo;

    public function __construct()
    {

        $this->reservationRepo = new ReservationRepository();
    }


    public function handleCartReservation($cartItems)
{
    if (!empty($cartItems)) {
        $reservationNb = uniqid('RES-');
        foreach ($cartItems as $item) {
            $data = [
                'user_Id' => $_SESSION['userId'], // Assurez-vous que cet ID est sécurisé et valide
                'vehicle_Id' => $item['vehicleId'],
                'start_Date' => $item['startDate'],
                'end_Date' => $item['endDate'],
                'total_Price' => $item['totalPrice'], // Assurez-vous que ce total est calculé correctement
                'reservation_Nb' => $reservationNb,
                'pickup_agency_id' => $_POST['pickup_agency_id'],
                'return_agency_id' => $_POST['return_agency_id']
            ];

            if ($this->validateAgencyIds($data['pickup_agency_id'], $data['return_agency_id'])) {
                $this->reservationRepo->addReservation($data);
            } else {
                $_SESSION['reservationError'] = "Agence de prise en charge ou de retour invalide.";
                return false;
            }
        }

        // Nettoyer le panier et définir un message de confirmation
        $_SESSION['cart'] = [];
        $_SESSION['reservationSuccess'] = "Votre commande a bien été effectuée.";
        return true;
    } else {
        $_SESSION['reservationError'] = "Votre panier est vide.";
        return false;
    }
}

private function validateAgencyIds($pickupAgencyId, $returnAgencyId)
{
    // Implémentez la validation ici pour vous assurer que les agences sont valides
    // Cela pourrait inclure la vérification que les IDs existent dans votre base de données
    return true; // Retournez true si tout est correct, false autrement
}

}
