<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('usuario_model');
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

        $aData['rsUsuarios'] = $this->usuario_model->getUsuario();

		$this->load->view('template_header');
		$this->load->view('usuario', $aData);
		$this->load->view('template_footer');

    }

    public function acao(){

        switch ($this->input->post('iacao')) {
            // Nova Usuario
            case 1:
                $this->form_validation->set_rules('nome', 'nome', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('senha', 'senha', 'required');
                $this->form_validation->set_rules('adm', 'tipo de conta', 'required|integer');

                break;
            // Atualizar Usuario
            case 2:
                $this->form_validation->set_rules('iacao', 'ID Ação', 'required|integer');
                $this->form_validation->set_rules('idado', 'ID Dado', 'required|integer');

                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('senha', 'senha', 'required');
                $this->form_validation->set_rules('adm', 'tipo de conta', 'required|integer');
                break;
        }

        $aData['rsUsuarios'] = $this->usuario_model->getUsuario();
        $aData['aUsuarios']  = $this->usuario_model->getUsuario($this->uri->segment(3));


        if ($this->form_validation->run() === FALSE){

            $this->load->view('template_header');
    		$this->load->view('usuario', $aData);
    		$this->load->view('template_footer');

        }else{

            switch ($this->input->post('iacao')) {
                // Nova Usuario
                case 1:

                    if($this->usuario_model->setUsuario()){
                        $this->index(TRUE);
                    }else{
                        $this->index(FALSE);
                    }

                    break;

                // Atualizar Usuario
                case 2:
                    $this->usuario_model->setUsuarioAtualizar();
                    $this->index(TRUE);
                    break;
            }

        }

    }

    public function deletar(){

        if($this->usuario_model->setUsuarioDeletar($this->uri->segment(3))){
            $this->index(TRUE);
        }else{
            $this->index(FALSE);
        }

    }


}
