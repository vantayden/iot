<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules_model extends MY_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_devices_by_user_id($user_id)
    {
        $this->db->select('m_id,m_name')->where('u_id', $user_id);
        return $this->db->get('modules')->result_array();
    }


    public function get_devices_info_by_user_id($user_id)
    {
         $this->db->select('m.m_id,m.m_name, mt.prefix')
        ->from('modules as m')
        ->join('module_type as mt', 'm.mt_id = mt.mt_id')
        ->where('u_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function check_modules_for_user($modules_id)
    {
        $clause =  array('u_id' => $this->ion_auth->user()->row()->id,
                        'm_id' => $modules_id );
        $this->db->select('m_id,m_name')->where($clause);
        return $this->db->get('modules')->num_rows();
        
        
    }



    

}
