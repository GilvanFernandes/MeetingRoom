<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('sala_model');
    }

    public function index(){

        $aData['rsSalas'] = $this->sala_model->getSala();

		$this->load->view('template_header');
		$this->load->view('reserva', $aData);
		$this->load->view('template_footer');

    }

    public function criar(){

        $this->form_validation->set_rules('idsala', 'ID sala', 'required|integer');
        $this->form_validation->set_rules('idusuario', 'ID usuário', 'required|integer');
        $this->form_validation->set_rules('assunto', 'assunto', 'required');
        $this->form_validation->set_rules('data', 'data', 'required');
        $this->form_validation->set_rules('hora', 'hora', 'required');

        if ($this->form_validation->run() === FALSE){

            $this->index();

        }else{

            if($this->sala_model->setReserva()){
                $this->index(TRUE);
            }else{
                $this->index(FALSE);
            }

        }

    }

    public function cancelar(){

    }


}
