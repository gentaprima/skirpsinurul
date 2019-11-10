<?php

    class Login extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function index(){
            if($this->session->userdata('login')){
                redirect(base_url().'dashboard');
            }

            $this->load->view('users/login');
            
        }
        
        public function prosesLogin(){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if($username == null){
                $this->session->set_flashdata('type','warning');
                $this->session->set_flashdata('message','Username tidak boleh kosong !');
                redirect(base_url());
            }

            if($password == null){
                $this->session->set_flashdata('type','warning');
                $this->session->set_flashdata('message','Password tidak boleh kosong !');
                redirect(base_url());
            }

            $getDataUsers = $this->db->get_where('users',array('username' =>$username))->row_array();
            if($getDataUsers == null){
                $this->session->set_flashdata('type','danger');
                $this->session->set_flashdata('message','Username tidak ditemukan !');
                redirect(base_url());
            }

            if($getDataUsers['password'] != md5($password)){
                $this->session->set_flashdata('type','danger');
                $this->session->set_flashdata('message','Username atau password tidak benar !');
                redirect(base_url());
            }else{
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('users_id',$getDataUsers['username']);
                $this->session->set_userdata('email',$getDataUsers['email']);
                redirect(base_url().'dashboard');
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }



    }