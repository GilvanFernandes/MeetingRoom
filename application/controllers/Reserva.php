<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('sala_model');
    }

    public function index($bRetorno = NULL){

        switch ($bRetorno) {
            case TRUE:
                $sRetorno = 'Ação executado com sucesso!';
                break;
            case FALSE:
                $sRetorno = 'Não foi possível executar está ação';
                break;
        }

        $aData['rsSalas']          = $this->sala_model->getSala();
        $aData['rsReservasHoje']   = $this->sala_model->getReserva(3);
        $aData['rsReservasAmanha'] = $this->sala_model->getReserva(2);
        $aData['rsReservasMes']    = $this->sala_model->getReserva(1);

		$this->load->view('template_header');
		$this->load->view('reserva', $aData);
		$this->load->view('template_footer');

    }

    public function criar(){

        $this->form_validation->set_rules('idsala', 'ID sala', 'required|integer');
        $this->form_validation->set_rules('idusuario', 'ID usuário', 'required|integer');
        $this->form_validation->set_rules('assunto', 'assunto', 'required|min_length[3]|max_length[25]');
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

        if($this->sala_model->setDeletarReserva($this->uri->segment(3))){
            $this->index(TRUE);
        }else{
            $this->index(FALSE);
        }

    }


}
