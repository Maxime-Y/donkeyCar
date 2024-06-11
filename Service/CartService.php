<?php
class CartService {

    public function addVehicleToCart($vehicleId, $dailyRate, $brand, $model, $image, $startDate, $endDate, $startAgency, $endAgency) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][$vehicleId] = [
            'vehicleId' => $vehicleId,
            'dailyRate' => $dailyRate,
            'brand' => $brand,
            'model' => $model,
            'image' => $image,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startAgency' => $startAgency,
            'endAgency' => $endAgency
        ];
    }
    public function getReservationAgency() {
        $startAgency = $_POST['agencyStart'];
        $endAgency = $_POST['agencyEnd'];
        return [
            'startAgency' => $startAgency,
            'endAgency' => $endAgency
        ];
    }

    public function getReservationDate() {
        $startDate = $_POST['start_Date'];
        $endDate = $_POST['end_Date'];
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }


}