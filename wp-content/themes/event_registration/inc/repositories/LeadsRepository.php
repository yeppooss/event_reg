<?php 
require_once dirname(__FILE__) . '/../models/Lead.php';

class LeadsRepository {
    public static function GetAll(){
        $leads = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'lead'
        ));

        $parsed_leads = self::ParseLeads($leads);

        return $parsed_leads;
    }

    public static function SaveLead($leadDTO){
        $id = self::ExistsByPhoneNumber($leadDTO);

        var_dump(wp_insert_post( array(
            'ID' => $id,
            'post_type' => 'lead',
            'post_status' => 'publish',
            'post_title' => $leadDTO->first_name . " " . $leadDTO->last_name,
            'meta_input' => array(
                'first_name' => $leadDTO->first_name,
                'last_name' => $leadDTO->last_name,
                'phone_number' => $leadDTO->phone_number,
                'events' => $leadDTO->events
            )
        ) ));
    }

    private static function ParseLeads($leads) {
        $parsed_leads = array();

        foreach($leads as $lead){
            $lead_instance = Lead::FromWPPost($lead);

            array_push($parsed_leads, $lead_instance);
        }


        return $parsed_leads;
    }

    private static function ExistsByPhoneNumber($leadDTO){
        $leads = get_posts(array(
            'posts_per_page'    => -1,
            'post_type'     => 'lead',
            'meta_key'      => 'phone_number',
            'meta_value'    => $leadDTO->phone_number
        ));

        return count($leads) > 0 ? $leads[0]->ID : 0; 
    }
}
?>