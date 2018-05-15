<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_01_dsetting_model extends MY_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('setting_timer_model');
        $this->load->model('setting_humidity_model');
        $this->load->model('setting_temperature_model');
        $this->load->model('setting_day_timer_model');

    }

    public function check_status($module_id, $device_name_id)
    {
        return $this->db->select($device_name_id)->where('mdl1_id',$module_id)
        ->get('mdl_01_dsetting')->row()->$device_name_id;
    }


}
// array(7) { ["device_name_id"]=> string(8) "mdl1_d_1" ["devicestatus"]=> string(1) "0" ["temperature"]=> string(1) "0" 
// ["humidity"]=> string(1) "0" ["timer"]=> string(1) "0" ["day_timer_end"]=> string(8) "00:00:00" 
// ["day_timer_start"]=> string(8) "23:59:00" }