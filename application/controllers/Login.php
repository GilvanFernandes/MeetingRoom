<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index(){
        $this->load->view('login');
    }

    public function validacao(){

        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if ($this->form_validation->run() === FALSE){

            $this->load->view('login');

        }else{

            $aData = $this->login_model->getValidacao();

            if(count($aData) == 1){

                foreach ($aData as $aPessoa) {
                     $aDadosSessao = array('id'     => $aPessoa->id,
                                           'nome'   => $aPessoa->nome,
                                           'email'  => $aPessoa->email,
                                           'adm'    => $aPessoa->adm,
                                           'logado' => TRUE);
                }

                $this->session->set_userdata($aDadosSessao);

                redirect('reserva');

            }else{
                redirect('login');
            }
        }
    }

    public function deslogar(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
