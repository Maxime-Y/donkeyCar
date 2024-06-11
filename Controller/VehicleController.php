<?php

require_once __DIR__ . '../../Model/Repository/VehicleRepository.php';

class VehicleController
{
    private $vehicleRepo;

    public function __construct()
    {
        $this->vehicleRepo = new VehicleRepository();
    }

    public function showVehicleAvailable()
    {   
        $agencyInfoStart = $_POST['agencyStart'];
        $agencyInfoEnd = $_POST['agencyEnd'];
        $_SESSION['agency_info'] = [
            'start_agency' => $agencyInfoStart,
            'end_agency' => $agencyInfoEnd
        ];

        $dateInfoStart =   $_POST['start_Date'];
        $dateInfoEnd =   $_POST['end_Date'];
        $_SESSION['date_info'] = [
            'start_date' => $dateInfoStart,
            'end_date' => $dateInfoEnd
        ];
            
        $vehiclesAvailable = $this->vehicleRepo->getVehicleAvailable();
        require_once './Template/layout.html.php';
        require_once __DIR__ . '/../Template/vehicleAvailable.html.php';
    }
    
}