<?php
class Sala_model extends CI_Model {

    public function __construct(){

    }

    public function getSala($iIdSala = NULL){

        if(!empty($iIdSala) && $iIdSala > 0){

            $this->db->where('id', $iIdSala);
            $rsQuery = $this->db->get('salas');
            return $rsQuery->row();

        }else{

            $sSQL  ="     SELECT *              ";
            $sSQL .="       FROM salas          ";
            $sSQL .="      WHERE status = 1;    ";

            $rsSQL = $this->db->query($sSQL);
            return $rsSQL->result();

        }



    }

    public function setSala(){

        $aData = array('sala'     => $this->input->post('sala'),
                       'detalhes' => $this->input->post('detalhes'));
        return $this->db->insert('salas', $aData);

    }

    public function setSalaDeletar($iIdSala){

        $sSQLVerificar  = "      SELECT count(*) AS total                                    ";
        $sSQLVerificar .= "        FROM salas                                                ";
        $sSQLVerificar .= "  INNER JOIN salas_reservas ON salas_reservas.salas_id = salas.id ";
        $sSQLVerificar .= "       WHERE salas.id = ".$iIdSala.";                             ";
        $rsSQLVerificar = $this->db->query($sSQLVerificar);

        if($rsSQLVerificar->row()->total == 0){

            $aData = array('status'                      => 2,
                           'data_atualizacao'            => 'now()');

            $this->db->where('id', $iIdSala);
            return $this->db->update('salas', $aData);

        }else{

            return false;

        }

    }

    public function setSalaAtualizar(){

        $aData = array('sala'             => $this->input->post('sala'),
                       'detalhes'         => $this->input->post('detalhes'),
                       'data_atualizacao' => 'now()');

        $this->db->where('id', $this->input->post('idado'));
        return $this->db->update('salas', $aData);

    }

    public function setReserva(){


        if(strpos($this->input->post('hora'), 'A')){
            $sHora = substr($this->input->post('hora'),0,5).":00";
        }else{

             switch ( substr($this->input->post('hora'),0,2)) {
                 case '01':
                     $sNum = '13';
                     break;
                case '02':
                    $sNum = '14';
                     break;
                case '03':
                     $sNum = '15';
                     break;
                case '04':
                     $sNum = '16';
                     break;
                case '05':
                     $sNum = '17';
                     break;
                case '06':
                     $sNum = '18';
                     break;
                case '07':
                     $sNum = '19';
                     break;
                case '08':
                     $sNum = '20';
                     break;
                case '09':
                     $sNum = '21';
                     break;
                case '10':
                     $sNum = '22';
                     break;
                 default:
                     $sNum = '23';
                     break;
             }

             $sHora = $sNum.":00:00";

        }

        $aData = array('descricao'   => $this->input->post('assunto'),
                       'data'        => implode('-', array_reverse(explode('/',$this->input->post('data')))),
                       'hora'        => $sHora,
                       'salas_id'    => $this->input->post('idsala'),
                       'usuarios_id' => $this->input->post('idusuario'));
        return $this->db->insert('salas_reservas', $aData);

    }

    public function setDeletarReserva(){

        $aData = array('estado'                      => 2,
                       'data_atualizacao'            => now());

        $this->db->where('id', $this->input->post('salas'));
        return $this->db->update('salas_reservas', $aData);

    }


}
