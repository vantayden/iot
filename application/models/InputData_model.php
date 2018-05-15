<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputData_model extends CI_Model
{
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
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function index()
    {
        $this->load->view('welcome_message');
    }


    public function receiveTempHum($data)
    {
//        dua du lieu vao bang tam
        $this->_del_old_data($data['device_id']);
        $this->db->insert('templog', $data);
//        dua du lieu vao banh chinh
        if ( $this->_get_time_new('templog' , $data['device_id'] ) - $this->_get_time_new('main_templog',$data['device_id'] ) > 3600 ) {
            $this->db->insert('main_templog', $data);
        }
    }


    // Xoa du lieu cu
    private function _del_old_data($device_id)
    {
        $sql = "DELETE FROM templog WHERE device_id = " . $device_id . " AND timestamp < DATE_SUB( NOW( ) , INTERVAL 2 MINUTE )";
        $this->db->query($sql);
    }

    // lay gia tri cau tien trong bang
    private function _get_time_new($name_table, $device_id)
    {
        $query = $this->db->select('timestamp')->from($name_table)->where('device_id', $device_id)->limit(1)->order_by('timestamp DESC')->get();
        return ($query->row() != null ? strtotime($query->row()->timestamp) : 0);

    }


}
