<?php 

    class EventDTO {
        public  string $id;
        public  string $title;
        public  string $start;
        public  string $end;
        public  string $image;
    
        public function __construct(string $id, string $title, string $start_date, string $end_date, string $image){
            $this->id = $id;
            $this->title = $title;
            $this->start = $start_date;
            $this->end = $end_date;
            $this->image = $image;
        }
    
        public static function FromEvent($event){
            $id = $event->GetId();
            $title = $event->GetTitle();
            $start_date = $event->GetStart();
            $end_date = $event->GetEnd();
            $image = $event->GetImage();
    
            $event_instance = new static($id, $title, $start_date, $end_date, $image);
            return $event_instance;
        }
    }
    
?>