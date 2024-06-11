<?php

require_once __DIR__ . '../../Service/CartService.php';

class CartController {
    private $cartService;
    private $reservationRepo;

    public function __construct($cartService) {
        $this->cartService = $cartService;
        $this->reservationRepo = new ReservationRepository();  // L'objet PDO est géré à l'intérieur du Repository
    }

    public function addToCart() {
        $vehicleId = $_POST['vehicle_id'];
        $dailyRate = $_POST['daily_rate'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $image = $_POST['image'];
        $startDate = $_SESSION['date_info']['start_date'];
        $endDate = $_SESSION['date_info']['end_date'];
        $agencyStart = $_SESSION['agency_info']['start_agency'];
        $agencyEnd = $_SESSION['agency_info']['end_agency'];
        //var_dump($_POST);
        //var_dump($_SESSION);

        $this->cartService->addVehicleToCart($vehicleId, $dailyRate, $brand, $model, $image, $startDate, $endDate, $agencyStart, $agencyEnd);
        header("Location: index.php?page=cart");
        exit;
    }
    


    public function removeFromCart($vehicleId) {
        if (isset($_SESSION['cart'][$vehicleId])) {
            unset($_SESSION['cart'][$vehicleId]);
        }
    }
    public function showReservationAgency() {
        $reservationAgency = $this->cartService->getReservationAgency();
        require_once __DIR__ . '/../Template/cart.html.php';
        return $reservationAgency;
    }

    public function showReservationDate() {
        $reservationDate = $this->cartService->getReservationDate();
        require_once __DIR__ . '/../Template/cart.html.php';
        return $reservationDate;
    }

    public function confirmReservation() {
        if (!empty($_SESSION['cart'])) {
            $reservationNb = uniqid('RES-');
            //var_dump($_SESSION);
            foreach ($_SESSION['cart'] as $item) {
                $data = [
                    'user_Id' => $_SESSION['user']['id'],
                    'vehicle_Id' => $item['vehicleId'],
                    'start_Date' => $item['startDate'],
                    'end_Date' => $item['endDate'],
                    'total_Price' => $item['totalPrice'],
                    'reservation_Nb' => $reservationNb
                ];
                //var_dump($data);
                $this->reservationRepo->addReservation($data);
                var_dump($data);
                header("Location: index.php?page=cart");
            }
            
            $_SESSION['cart'] = []; // Nettoyer le panier
            $_SESSION['reservationSuccess'] = "Votre commande a bien été effectuée.";
        } else {
            $_SESSION['reservationError'] = "Votre panier est vide.";
        }
        $this->showCart();
    }

    public function showCart() { 
        require_once './Template/layout.html.php';
        require_once __DIR__ . '/../Template/cart.html.php';
    }
}