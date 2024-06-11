<?php

require_once __DIR__ . '../../Model/Repository/AgencyRepository.php';

class AgencyController {
    private $agencyRepo;

    public function __construct() {
        $this->agencyRepo = new AgencyRepository();
    }

    // Affichage de la page des véhicules avec des véhicules chargés

    public function showAgencies() {
        $agencies = $this->agencyRepo->getAll();  // Récupérer toutes les agences
        require_once __DIR__ . '/../Template/homePage.html.php';
    }
    

}