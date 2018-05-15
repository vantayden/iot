<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_01_s_model extends MY_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_humidity($module_id,$device_id)
    {
        $clause = array('mdl_id' => $module_id, 
        'dvc_name_id' => $device_id);
        return $this->db->select('humidity')->where($clause)->get('setting_humidity')->row()->humidity;
    }
   

    public function get_current_humidity($module_id)
    {
        return $this->db->select('mdl1_s_h')->where('mdl1_id',$module_id)->limit(1)->get('mdl_01_s')->row()->mdl1_s_h;
    }
    public function get_current_temperature($module_id)
    {
        return $this->db->select('mdl1_s_t')->where('mdl1_id',$module_id)->limit(1)->get('mdl_01_s')->row()->mdl1_s_t;
    }

    

}
