<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //if($this->session->userdata('logado')){
        //    redirect('login');
        //}

        $this->load->model('sala_model');
    }

    public function index($bRetorno = NULL){

        switch ($bRetorno) {
            case TRUE:
                $sRetorno = 'Sala criado com sucesso!';
                break;
            case FALSE:
                $sRetorno = 'Não foi possível criar sala!';
                break;
        }

        $aData['rsSalas'] = $this->sala_model->getSala();

		$this->load->view('template_header');
		$this->load->view('sala', $aData);
		$this->load->view('template_footer');

    }

    public function acao(){
        // 1 - Criar / 2 - Atualiza / 3 - Deletar

        $aData['rsContasSubstituta'] = $this->financeiro_model->getContas(7);

        $this->form_validation->set_rules('sala', 'sala', 'required');

        if ($this->form_validation->run() === FALSE){

            $this->load->view('template_header');
    		$this->load->view('sala');
    		$this->load->view('template_footer');

        }else{

            if($this->sala_model->setSala()){
                $this->index(TRUE);
            }else{
                $this->index(FALSE);
            }

        }

    }

}
