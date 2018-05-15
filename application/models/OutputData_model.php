<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputData_model extends CI_Model {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */





    public function index()
    {

    }


    public function showTemplate()
    {
        $device_id = $this->_get_device_id();
        $this->db->limit(1);
        $this->db->order_by('timeStamp', 'DESC')->where('device_id', $device_id);
        $query  = $this->db->get('templog');
        return $query->row()->temperature;
    }


    public function showHumidity()
    {
        $device_id = $this->_get_device_id();
        $this->db->limit(1);
        $this->db->order_by('timeStamp', 'DESC')->where('device_id', $device_id);
        $query  = $this->db->get('templog');
        return $query->row()->humidity;
    }


    public function getListTemplate()
    {
        $device_id = $this->_get_device_id();
        $this->db->limit(12);
        $this->db->order_by('timeStamp', 'DESC')->where('device_id', $device_id);
        $query  = $this->db->get('templog');
        return json_encode($query->result_array());
    }

    public function getListHumidity()
    {

    }


    private function _get_device_id()
    {
        $user_id = $this->ion_auth->user()->row()->id;
        $this->db->select('device_id')->where(array('user_id' => $user_id, 'type_id' => 1));
        return $this->db->get('devices')->row()->device_id;
    }

}
