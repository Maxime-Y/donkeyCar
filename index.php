<?php

require_once "include.php";
require_once './Controller/VehicleController.php';
require_once './Controller/HomeController.php';
require_once './Controller/ReservationController.php';
require_once './Controller/LogController.php';
require_once './Controller/CartController.php';

$cartService = new CartService();

session_start();


$routes = [
    'home' => function () {
        $controller = new homeController();
        $controller->showHomePage();
    },
    'vehicleAvailable' => function () {
        // Si les données du formulaire sont bien remplies
        if (isset($_POST['start_Date']) && isset($_POST['end_Date'])) {
            $controller = new VehicleController();
            $controller->showVehicleAvailable();
        } },    
        
    'register' => function () {
        $controller = new LogController();
        $controller->register();
        $controller->showRegisterPage();
    },
    
    'insurance' => function () {
        $controller = new insuranceController();
        $controller->showInsurances();
    },

    'logDetail' => function () {
        $controller = new LogController();
        $controller->showLogDetailPage();
    },

    'login' => function () {
        $controller = new LogController();
        $controller->login();
    },
    
    'logout' => function () {
        $controller = new LogController();
        $controller->logout();
    },
    'addToCart' => function () use ($cartService) { 
        $controller = new CartController($cartService);   
        $controller->addToCart();
        header("Location: index.php?page=cart");
    },
    'cart' => function () use ($cartService) { 
        $controller = new CartController($cartService);
        $controller->showCart();
        $controller->showReservationDate();
        $controller->showReservationAgency();
    },
    'removeFromCart' => function () use ($cartService) { 
        $controller = new CartController($cartService);
        $controller->removeFromCart($_GET['vehicleId']);
        header("Location: index.php?page=cart"); 
    },
    'confirmReservation' => function () use ($cartService) {
        $controller = new CartController($cartService);
        $controller->confirmReservation();
        
    },
];

$page = $_GET['page'] ?? 'home';

if (array_key_exists($page, $routes)) {
    $routes[$page]();
}
