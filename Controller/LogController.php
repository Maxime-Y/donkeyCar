<?php
require_once __DIR__ . '../../Service/RegisterService.php';
require_once __DIR__ . '../../Service/LoginService.php';
require_once __DIR__ . '../../Model/Repository/ReservationRepository.php';
require_once __DIR__ . '../../Model/Repository/EntityRepository.php';


class LogController {
    private $userRepository;
    private $reservationRepo;


    public function __construct() {
        $this->userRepository = new UserRepository();
        
    }
    public function showRegisterPage() {
        require_once './Template/layout.html.php';
        require_once __DIR__ . '../../Template/register.html.php';
    }
    public function showLogDetailPage() {
           
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');            
            exit;
        }    
        $user = $_SESSION['user'];
        $this->reservationRepo = new ReservationRepository();    
        $reservations = $this->reservationRepo->getByUserId($user['id']);         
        require_once './Template/layout.html.php';
        require_once __DIR__ . '../../Template/logDetail.html.php';
    }
    
    public function login() {
        $loginService = new LoginService();
        $loginService->login();
    }
    public function register() {
        $registerService = new RegisterService();
        $registerService->register();
    }
    public function logout() {
        $loginService = new LoginService();
        $loginService->logout();
    }
  
}


