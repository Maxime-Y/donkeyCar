<?php

require_once __DIR__ . '../../Model/Repository/AgencyRepository.php';
require_once __DIR__ . '../../Model/Repository/VehicleRepository.php';
require_once __DIR__ . '../../Model/Repository/EntityRepository.php';

class HomeController
{
    private $agencyRepo;
    private $vehicleRepo;

    public function __construct()
    {
        $this->agencyRepo = new AgencyRepository();
        $this->vehicleRepo = new VehicleRepository(); // Ajout pour gérer les véhicules
    }

    public function showHomePage()
    {
        $agencies = $this->agencyRepo->getAll();  // Récupérer toutes les agences
        $images = $this->vehicleRepo->getAll(); // cette méthode renvoie toutes les données de véhicules
        $date = $this->vehicleRepo->getCurrentDate();  // Récupérer la date actuelle
        require_once __DIR__ . '/../Template/homePage.html.php';
    }
    
}
