<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //if(!$this->session->userdata('id_usuario') || !$this->session->userdata('id_empresa') || !$this->session->userdata('logado')){
        //    redirect('login');
        //}

        //$this->load->model('financeiro_model');
    }

    public function index(){


        // Lista dentro option no campo de pesquisa
        //$aData['rsPessoas']         = $this->pessoa_model->getPessoa();

		$this->load->view('template_header');
		$this->load->view('reserva');
		$this->load->view('template_footer');

    }

    public function criar(){

    }

    public function cancelar(){

    }


}
