<?php 

class Event{
    private  string $id;
    private  string $title;
    private  string $start;
    private  string $end;
    private  string $image;

    public function __construct(string $id, string $title, string $start_date, string $end_date, string $image){
        $this->id = $id;
        $this->title = $title;
        $this->start = date("Y-d-m", strtotime($start_date));
        $this->end = date("Y-d-m", strtotime($end_date));
        $this->image = $image;
    }

    public static function FromWPPost($wp_post){
        $id = $wp_post->ID;
        $title = $wp_post->post_title;
        $start_date = get_field("start_date", $id);
        $end_date = get_field("end_date", $id);
        $image = get_field("image", $id);

        $event_instance = new static($id, $title, $start_date, $end_date, $image);
        return $event_instance;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId(int $id){
        $this->id = $id;
    }

    public function GetTitle(){
        return $this->title;
    }

    public function SetTitle(string $title){
        $this->title = $title;
    }

    public function GetStart(){
        return $this->start;
    }

    public function SetStart(string $start){
        $this->start = $start;
    }

    public function GetEnd(){
        return $this->end;
    }

    public function SetEnd(string $end){
        $this->end = $end;
    }

    public function GetImage(){
        return $this->image;
    }

    public function SetImage(string $image){
        $this->image = $image;
    }
}

?>