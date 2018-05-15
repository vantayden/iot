<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_day_timer_model extends MY_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

    
    public function get_day_timer_start($module_id,$device_id)
    {
        $clause = array('mdl_id' => $module_id, 
        'dvc_name_id' => $device_id);
        return $this->db->select('start_time')->where($clause)->get('setting_day_timer')->row()->start_time;
    }
    public function get_day_timer_end($module_id,$device_id)
    {
        $clause = array('mdl_id' => $module_id, 
        'dvc_name_id' => $device_id);
        return $this->db->select('end_time')->where($clause)->get('setting_day_timer')->row()->end_time;
    }


    

}
