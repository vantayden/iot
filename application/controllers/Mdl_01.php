<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_01 extends MY_Controller {

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
	
     public function __construct()
     {
         parent::__construct();
		 $this->load->database();
		 $this->load->model('mdl_01_dsetting_model');
		 date_default_timezone_set("Asia/Ho_Chi_Minh");
		 $this->load->model('modules_model');
		 $this->load->model('mdl_01_model');
		 $this->load->model('setting_timer_model');
		 $this->load->helper('url');
		 $this->load->model('setting_timer_model');
		 $this->load->model('setting_humidity_model');
		 $this->load->model('setting_temperature_model');
		 $this->load->model('setting_day_timer_model');
		 $this->load->model('mdl_01_s_model');

		 if ($this->ion_auth->logged_in())
		 {
			$this->mViewData['list_info_devices'] = $this->modules_model->get_devices_info_by_user_id($this->ion_auth->user()->row()->id);
		 }	 
     }
     
	 // ham kiem tra dieu khien

	private function check_clause($str)
	{
		 
		$result = array();
		 if (is_numeric($str)) {
			 $result['type'] = 'number';
			 $result['data'] = $str;
		} else{
			 // kiem tra || va &&
			 if(strpos($str,'&&')){
				$result['type'] = '&&';
				$result['data'] = explode('&&',$str);
			} else if(strpos($str,'||')){
				$result['type'] = '||';
				$result['data'] = explode('||',$str);
			}
		}
		 return $result;
	}

	//  setting_humidity_model
	// setting_temperature_model
	 // get data sensor
	//  --get h
	public function get_humidity($module_id)
	{
		echo $this->mdl_01_model->get_status($module_id,'mdl1_d_1');
		// echo $this->mdl_01_s_model->get_current_temperature($module_id);
	}
	public function set_status_by_ht($current, $setting)
	{
		// if return 1 =>> on  else =>> off
		if ($setting['type'] == 'number') {
			if($current  > $setting['data']){
				return 0;
			} else{
				return 1;
			}
		} else if($setting['type'] == '&&'){
			if($current > $setting['data'][0] && $current < $setting['data'][1]){
				return 0;
			} else{
				return 1;
			}
		} else{
			if($current > $setting['data'][0]){
				return 0;
			} else if($current < $setting['data'][1]){ 
				return 1;
			}
		}
	}
	// test
	public function test($module_id)
	{
		// $list_devices = $this->mdl_01_model->get_list_device_name_id($module_id);
		// var_dump($list_devices);
		$current_h = $this->mdl_01_s_model->get_current_temperature($module_id);
		var_dump($current_h);
	}

	// set_stutus by timer

	// private function set_status_by_timer($end_timer)
	// {
	// 	date_default_timezone_set("Asia/Ho_Chi_Minh");
	// 	$now = new DateTime(date("Y-m-d H:i:s"));
	// 	$end_time = new DateTime($end_timer);
	// 	if ($now > $end_time) {
	// 		return 0;
	// 	} else{
	// 		return 1;
	// 	}		
	// }

	public function set_status_by_day_timer($start  = 0, $end = 0)
	{
		// $start = new DateTime($this->setting_day_timer_model->get_day_timer_start($module_id,$value));
		// $end = new DateTime($this->setting_day_timer_model->get_day_timer_end($module_id,$value));
		$now = new DateTime(date("H:i:s"));
		if ($now > $start && $now < $end) {
			return 0;
		} else{
			return 1;
		}		
	}

	 // xu ly du lieu cai dat
	 public function update_status($module_id)
	 {
		
		$list_devices = $this->mdl_01_model->get_list_device_name_id($module_id);
		// // check status
		foreach ($list_devices as $value) {
			switch ($this->mdl_01_dsetting_model->check_status($module_id, $value)) {
				case 1:
					// Kiem tra do am
					//get nhiet do hien tai
					$current_t = $this->mdl_01_s_model->get_current_temperature($module_id);
					$setting_t = $this->setting_temperature_model->get_temperature($module_id,$value);
					$setting = $this->check_clause($setting_t);
					// thay doi trang thai
					$this->mdl_01_model->change_status_by_id($module_id, $value, $this->set_status_by_ht($current_t,$setting));
					break;
				case 2:
					// Kiem tra do am
					//get nhiet do hien tai
					$current_h = $this->mdl_01_s_model->get_current_humidity($module_id);
					$setting_h = $this->setting_humidity_model->get_humidity($module_id,$value);
					$setting = $this->check_clause($setting_h);
					// thay doi trang thai
					$this->mdl_01_model->change_status_by_id($module_id, $value, $this->set_status_by_ht($current_h,$setting));
					break;
				case 3:
					$now = new DateTime(date("Y-m-d H:i:s"));
					$end_time = new DateTime($this->setting_timer_model->get_end_time($module_id,$value));
					$mS = 0;
					if ($now >= $end_time) {
						$mS = ($this->mdl_01_model->get_status($module_id,$value) == 1) ? 1 : 0;
						$this->mdl_01_model->change_status_by_id($module_id, $value,$mS);
						$this->mdl_01_model->set_status_default($module_id, $value);
					}
					
					break;
				case 4:
					$now = new DateTime(date("H:i:s"));
					$start = new DateTime($this->setting_day_timer_model->get_day_timer_start($module_id,$value));
					$end = new DateTime($this->setting_day_timer_model->get_day_timer_end($module_id,$value));
					$this->mdl_01_model->change_status_by_id($module_id, $value,$this->set_status_by_day_timer($start , $end));
					break;
				default:
					
			}
		}
		// ;

	 }
	 // check status 
	 
	public function change_status()
	{
		
			$module_id = $this->input->post('module_id');
			$device_name = $this->input->post('device_name');
			$device_status = $this->input->post('device_status');
			echo $this->mdl_01_model->change_status_by_id($module_id, $device_name, $device_status);
	}

	public function control($device_id)
	{
		if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
		if($this->modules_model->check_modules_for_user($device_id) == 0){
			redirect('home', 'refresh');
		}
		// echo $this->mdl_01_model->change_status_by_id(1, 'mdl1_d_1', 1);
		$mMdl['name'] = $this->mdl_01_model->get_name_by_id($device_id);
		$mMdl['id'] = $device_id;
		$this->mViewData['module_info'] = $mMdl;

		$this->mViewData['list_devices'] =  $this->mdl_01_model->get_device_by_id($device_id);
		
		
		$this->render('content/control_mdl_01');
        
	}
	 
	public function set_name($module_id)
	{
		
		if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
		if($this->modules_model->check_modules_for_user($module_id) == 0){
			redirect('home', 'refresh');
		}
		if($this->mMethod == 'POST'){
			$data = $this->input->post();
			$this->mdl_01_model->rename_device_by_id($module_id,$data);
		}
		$list_name = array();
		$list_name =  $this->mdl_01_model->get_list_name_by_id($module_id);

		$this->mViewData['list_device_name'] = $list_name;
		$this->render('content/set_name_mdl_01');
	}

	public function setup($module_id)
	{
		
		if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
		if($this->modules_model->check_modules_for_user($module_id) == 0){
			redirect('home', 'refresh');
		}
		if($this->mMethod == 'POST'){
			$data = $this->input->post();

			// update du lieu

			$this->mdl_01_model->updateDataSetting($data,$module_id);
		}
		$list_name = array();
		$list_name =  $this->mdl_01_model->get_setup_by_id($module_id);
		$this->mViewData['list_device_status'] = $this->mdl_01_model->get_list_status($module_id);
		$this->mViewData['list_device_setup'] = $list_name;
		$this->mViewData['t'] =  $this->mdl_01_s_model->get_current_temperature($module_id);
		$this->mViewData['h'] =  $this->mdl_01_s_model->get_current_humidity($module_id);
		$this->render('content/mdl_01_setup');
	}

	public function connect_device(){
		$device_id = $this->input->get('d');
		if($device_id != null){
			$this->update_status($device_id);
			echo json_encode($this->db->select('*')->where('mdl1_id', $device_id)->get('mdl_01_d')->row());
		}
	}
	
	public function connect_sensor(){
		$data = array(
            'mdl1_s_t' => $this->input->get('t')?:0,
            'mdl1_s_h' => $this->input->get('h')?:0,
            'mdl1_id' => $this->input->get('d'),
        );
        $this->db->insert('mdl_01_s', $data);
	}
}
