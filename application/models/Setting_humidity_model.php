<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_humidity_model extends MY_Model {
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
   

}
