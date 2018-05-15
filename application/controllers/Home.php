<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

        $this->load->model('modules_model');
    }


    public function index()
    {
        $this->mViewData['title'] = 'Trang chủ';


        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else{
            if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            $this->mViewData['User'] = $this->ion_auth->user()->row();
            // $this->load->view('content/home',$this->mViewData);

            $this->mViewData['list_info_devices'] = $this->modules_model->get_devices_info_by_user_id($this->ion_auth->user()->row()->id);
            $this->render("content/home");
        }
        else
        {
            $this->mViewData['User'] = $this->ion_auth->user()->row();
            // set the flash data error message if there is one
            $this->mViewData['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $this->mViewData['users'] = $this->ion_auth->users()->result();
            foreach ($this->mViewData['users'] as $k => $user)
            {
                $this->mViewData['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            
            // list devices
          
            


            $this->load->view('auth/index', $this->mViewData);
        }
    }
    }

    public function test()
    {

        echo '<pre>';

        $query = $this->db->get('templog');

        foreach ($query->result() as $row)
        {
            echo $row->timeStamp;
        }

        echo '</pre>';
    }


    public function test2()
    {
        $this->load->view('content/home');
    }

}
