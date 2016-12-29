<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        $this->isLoggedIn();
    }
    function isLoggedIn(){
    	if($this->session->userdata('loggedin_admin') == true){
    		header("location:".base_url('admin/index'));
    	}
    }
    function index(){
		$this->load->view('main_html_admin/login');
    }
    function do_login(){
        $params = $this->input->post();
        if($params != null){
            $dataSelect['username'] = $params['username'];
            $dataSelect['password'] = md5($params['password']);
            $selectData = $this->Gmodel->select($dataSelect, 'tm_user');
            if($selectData->num_rows() > 0){
                $dataSession = array();
                $dataSession['loggedin_admin'] = true;
                $dataSession['nama_admin'] = $selectData->row()->nama;
                $dataSession['kd_user'] = sha1($selectData->row()->kd_user);
                $this->session->set_userdata($dataSession);
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }
}