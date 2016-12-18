<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

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

        $aData['rsSalas'] = $this->sala_model->getSala();

		$this->load->view('template_header');
		$this->load->view('sala', $aData);
		$this->load->view('template_footer');

    }

    public function acao(){

        switch ($this->input->post('iacao')) {
            // Nova Sala
            case 1:
                $this->form_validation->set_rules('sala', 'sala', 'required');
                break;
            // Atualizar Sala
            case 2:
                $this->form_validation->set_rules('iacao', 'ID Ação', 'required|integer');
                $this->form_validation->set_rules('idado', 'ID Dado', 'required|integer');
                $this->form_validation->set_rules('sala', 'sala', 'required');
                break;
        }

        $aData['rsSalas'] = $this->sala_model->getSala();
        $aData['aSalas']  = $this->sala_model->getSala($this->uri->segment(3));


        if ($this->form_validation->run() === FALSE){

            $this->load->view('template_header');
    		$this->load->view('sala', $aData);
    		$this->load->view('template_footer');

        }else{

            switch ($this->input->post('iacao')) {
                // Nova Sala
                case 1:

                    if($this->sala_model->setSala()){
                        $this->index(TRUE);
                    }else{
                        $this->index(FALSE);
                    }

                    break;

                // Atualizar Sala
                case 2:
                    $this->sala_model->setSalaAtualizar();
                    $this->index(TRUE);
                    break;
            }

        }

    }

    public function deletar(){

        if($this->sala_model->setSalaDeletar($this->uri->segment(3))){
            $this->index(TRUE);
        }else{
            $this->index(FALSE);
        }

    }


}
