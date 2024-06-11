<?php

require_once 'EntityRepository.php';

class AgencyRepository extends EntityRepository {

    public function __construct($pdo = null)
    {
        parent::__construct($pdo, "agency");
    } 
}