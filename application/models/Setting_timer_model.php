<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_timer_model extends MY_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }
    public function get_timer_setting($module_id,$device_id)
    {
        $clause = array('mdl_id' => $module_id, 
                        'dvc_name_id' => $device_id);
        return $this->db->select('minute')->where($clause)->get('setting_timer')->row()->minute;
        
    }

    public function get_end_time($module_id,$device_name_id)
    {
        $clause =  array('mdl_id' => $module_id, 
        'dvc_name_id'=>$device_name_id);
        return $this->db->select('end_time')->where($clause)->get('setting_timer')->row()->end_time;
    }
   



    

}
