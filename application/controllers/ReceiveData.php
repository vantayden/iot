<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceiveData extends MY_Controller {

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
	public function mdl_01_s()
	{
        $data = array(
            'mdl1_s_t' => $this->input->get('t')?:0,
            'mdl1_s_h' => $this->input->get('h')?:0,
            'mdl1_id' => $this->input->get('d'),
        );
        $this->db->insert('mdl_01_s', $data);
	}

	
	public function mdl_01_d()
	{
		$device_id = $this->input->get('t');
		if($device_id != null){
			echo json_encode($this->db->select('*')->where('mdl1_id', $device_id)->get('mdl_01_d')->row());
		}
       
	}
	
}
