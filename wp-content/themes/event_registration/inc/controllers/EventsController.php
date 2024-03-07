<?php 
require_once dirname(__FILE__) . '/../repositories/EventsRepository.php';
require_once dirname(__FILE__) . '/../dtos/EventDTO.php';

class EventsController {
    public static function GetEventsList() {
        return self::ToDTO(EventsRepository::GetAll());
    }

    private static function ToDTO($events){
        return array_map(fn($event) => EventDTO::FromEvent($event), $events);
    }
}

?>