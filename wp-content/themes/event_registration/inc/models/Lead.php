<?php 
require_once dirname(__FILE__) . '/Event.php';

class Lead{
    private  string $id;
    private  string $first_name;
    private  string $last_name;
    private  string $phone_number;

    private $events = array();

    public function __construct(string $id, string $first_name, string $last_name, string $phone_number, array $events){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->events = $events;
    }

    public static function FromWPPost($wp_post){
        $id = $wp_post->ID;
        $first_name = get_field("first_name", $id);
        $last_name = get_field("last_name", $id);
        $phone_number = get_field("phone_number", $id);
        $events_posts = get_field('events', $id);
        
        $events = array();

        foreach($events_posts as $event)
        {
            $event_instance = Event::FromWPPost($event);
            array_push($events, $event_instance);
        }
        $lead_instance = new static($id, $first_name, $last_name, $phone_number, $events);
        return $lead_instance;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId(int $id){
        $this->id = $id;
    }

    public function GetFirstName(){
        return $this->first_name;
    }

    public function SetFirstName(string $first_name){
        $this->first_name = $first_name;
    }

    public function GetLastName(){
        return $this->last_name;
    }

    public function SetLastName(string $last_name){
        $this->last_name = $last_name;
    }

    public function GetPhoneNumber(){
        return $this->phone_number;
    }

    public function SetPhoneNumber(string $phone_number){
        $this->phone_number = $phone_number;
    }

    public function GetEvents(){
        return $this->events;
    }

    public function SetEvents(string $events){
        $this->events = $events;
    }
}

?>