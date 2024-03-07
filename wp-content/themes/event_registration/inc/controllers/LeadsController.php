<?php 
require_once dirname(__FILE__) . '/../repositories/LeadsRepository.php';

class LeadsController {
    public static function SaveLead($leadDTO){
        LeadsRepository::SaveLead($leadDTO);
    }
}

?>