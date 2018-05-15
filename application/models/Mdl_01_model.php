<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_01_model extends MY_Model {
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
    
    public function get_list_device_name_id($module_id)
    {
        $query = $this->db->select('*')->where('mdl1_id',$module_id)
        ->get('mdl_01_d')->result_array()[0];
        array_shift($query);
        $result = array();
        foreach($query as $item=>$value){
            array_push($result,$item);
        }
        return $result;
    }

    public function get_device_by_id($device_id)
	{
        $result = array();
        $this->db->select("*")->where("mdl1_id", $device_id);
        $status  = $this->db->get('mdl_01_d')->result_array()[0];

        $this->db->select("*")->where("mdl1_id", $device_id);
        $names  = $this->db->get('mdl_01_dname')->result_array()[0];
        array_shift($names);
        array_shift($status);
        foreach($status as $key => $value){
            $mArr = array(
                'status'    => $value,
                'name'      => $names[$key.'_name'],
            );
            $result[$key] = $mArr;
        }
        return $result;

    }

    public function get_setup_by_id($module_id)
	{
        $result = array();
        $this->db->select("*")->where("mdl1_id", $module_id);
        $status  = $this->db->get('mdl_01_dsetting')->result_array()[0];

        $this->db->select("*")->where("mdl1_id", $module_id);
        $names  = $this->db->get('mdl_01_dname')->result_array()[0];
        array_shift($names);
        array_shift($status);
        foreach($status as $key => $value){
            $mArr = array(
                'status'    => $value,
                'name'      => $names[$key.'_name'],
                'timer'     => $this->setting_timer_model->get_timer_setting($module_id,$key),
                'day_timer_start'   => $this->setting_day_timer_model->get_day_timer_start($module_id,$key),
                'day_timer_end'     =>$this->setting_day_timer_model->get_day_timer_end($module_id,$key),
                'h'         => $this->setting_humidity_model->get_humidity($module_id,$key),
                't'         =>$this->setting_temperature_model->get_temperature($module_id,$key)

            );
            $result[$key] = $mArr;
        }
        return $result;
        
    }
    
    public function change_status_by_id($module_id, $device_name , $device_status){
        
        if($device_status == 1){
            $this->db->set($device_name , 0 );
        } else{
            $this->db->set($device_name , 1 );
        }
        $this->db->where('mdl1_id', $module_id);
        $this->db->update('mdl_01_d');

        return $this->db->select($device_name)->where('mdl1_id', $module_id)->get('mdl_01_d')->row()->$device_name;
    }

    public function get_name_by_id($module_id)
    {
        return $this->db->select('m_name')->where('m_id', $module_id )->get('modules')->row()->m_name;
    }


    public function get_list_name_by_id($module_id)
    {
        $this->db->select("*")->where("mdl1_id", $module_id);
        $names  = $this->db->get('mdl_01_dname')->result_array()[0];
        array_shift($names);
        return $names;

    }
    
    public function rename_device_by_id($module_id,$data)
    {
        $this->db->set($data)->where('mdl1_id', $module_id)->update('mdl_01_dname');
    }

    public function updateDataSetting($data,$module_id)
    {
        $clause = array('mdl_id'=>$module_id,
                        'dvc_name_id'=>$data['device_name_id']);
        $this->db->trans_begin();
        // update trang thai
        $this->db->set($data["device_name_id"],$data['devicestatus']);
        $this->db->where('mdl1_id', $module_id);
        $this->db->update('mdl_01_dsetting');

        // nhiet do
        $this->db->set('temperature',$data['temperature']);
        $this->db->where($clause);
        $this->db->update('setting_temperature');

        // do am
        $this->db->set('humidity',$data['humidity']);
        $this->db->where($clause);
        $this->db->update('setting_humidity');

        // timer
        date_default_timezone_set("Asia/Ho_Chi_Minh");
		$now = date("Y-m-d H:i:s");
        $data_set = array(
            'minute'    => $data['timer'],
            'end_time'          => "DATE_ADD(".$now.", INTERVAL ".$data['timer']." MINUTE)",
        );
        $this->db->query("UPDATE `setting_timer` SET `minute` = '".$data['timer']."', `end_time` = DATE_ADD(NOW(), INTERVAL ".$data['timer']." MINUTE) WHERE `mdl_id` = '".$module_id."' AND `dvc_name_id` = '".$data['device_name_id']."'");
        // $this->db->set($data_set);
        // $this->db->where($clause);
        // $this->db->update('setting_timer');
        // echo $this->db->last_query(); die;

        // day_timer

        $this->db->set('start_time',$data["day_timer_start"]);
        $this->db->where($clause);
        $this->db->update('setting_day_timer');
        $this->db->set('end_time',$data["day_timer_end"]);
        $this->db->where($clause);
        $this->db->update('setting_day_timer');
        
       
        
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
        }
    }

    public function get_list_status($module_id)
    {
        return $this->db->select('*')->where('mdl1_id',$module_id)->get('mdl_01_d')->result_array()[0];
    }
    
    public function get_status($module_id,$device_name_id)
    {
        return $this->db->select($device_name_id)->where('mdl1_id',$module_id)->get('mdl_01_d')->row()->$device_name_id;
    }

    public function set_status_default($module_id,$device_name_id)
    {
        $this->db->set($device_name_id,0);
        $this->db->where('mdl1_id',$module_id);
        $this->db->update('mdl_01_dsetting');
    }

    

}
// array(7) { ["device_name_id"]=> string(8) "mdl1_d_1" ["devicestatus"]=> string(1) "0" ["temperature"]=> string(1) "0" 
// ["humidity"]=> string(1) "0" ["timer"]=> string(1) "0" ["day_timer_end"]=> string(8) "00:00:00" 
// ["day_timer_start"]=> string(8) "23:59:00" }