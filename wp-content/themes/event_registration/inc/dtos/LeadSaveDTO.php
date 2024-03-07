<?php 
class LeadSaveDTO{
    public string $id;
    public string $first_name;
    public string $last_name;
    public string $phone_number;

    public $events = array();

    public function __construct(string $id, string $first_name, string $last_name, string $phone_number, array $events){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->events = $events;
    }
}

?>