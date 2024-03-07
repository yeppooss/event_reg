<?php 
require_once dirname(__FILE__) . '/../models/Event.php';

class EventsRepository {
    public static function GetAll(){
        $events = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'event'
        ));

        $parsed_events = self::ParseEvents($events);

        return $parsed_events;
    }


    private static function ParseEvents($events) {
        $parsed_events = array();

        foreach($events as $event){
            $event_instance = Event::FromWPPost($event);

            array_push($parsed_events, $event_instance);
        }


        return $parsed_events;
    }
}
?>