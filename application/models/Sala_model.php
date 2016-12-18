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

    public function getReserva($iSQLDef){


        $sSQLReserva  = "      SELECT salas_reservas.id as id_reserva,                                        ";
        $sSQLReserva .= "             salas.id as id_sala,                                                    ";
        $sSQLReserva .= "             usuarios.id as id_usuario,                                              ";
        $sSQLReserva .= "             salas.sala,                                                             ";
        $sSQLReserva .= "             salas_reservas.descricao,                                               ";
        $sSQLReserva .= "             usuarios.nome,                                                          ";
        $sSQLReserva .= "             salas_reservas.descricao as assunto,                                    ";
        $sSQLReserva .= "             salas_reservas.data,                                                    ";
        $sSQLReserva .= "             salas_reservas.hora                                                     ";
        $sSQLReserva .= "        FROM salas                                                                   ";
        $sSQLReserva .= "  INNER JOIN salas_reservas ON salas_reservas.salas_id = salas.id                    ";
        $sSQLReserva .= "  INNER JOIN usuarios       ON usuarios.id             = salas_reservas.usuarios_id  ";
        $sSQLReserva .= "       WHERE                                                                         ";

        switch ($iSQLDef) {
            // Busca da agenda do mes
            case 1:
                $sSQLReserva .= " MONTH(salas_reservas.data)    = MONTH(current_date()) ";
                $sSQLReserva .= " AND YEAR(salas_reservas.data) = YEAR(current_date())  ";

                break;
            // Busca da agenda de amanha
            case 2:
                $sSQLReserva .= " DAY(salas_reservas.data)       = DAY(current_date()) +1 ";
                $sSQLReserva .= " AND MONTH(salas_reservas.data) = MONTH(current_date())  ";
                $sSQLReserva .= " AND YEAR(salas_reservas.data)  = YEAR(current_date())   ";

                break;
            // Busca da agenda do dia
            case 3:
                $sSQLReserva .= " DAY(salas_reservas.data)       = DAY(current_date())    ";
                $sSQLReserva .= " AND MONTH(salas_reservas.data) = MONTH(current_date())  ";
                $sSQLReserva .= " AND YEAR(salas_reservas.data)  = YEAR(current_date())   ";
                break;
        }
        $sSQLReserva .= "         AND salas_reservas.status = 1                                     ";
        $sSQLReserva .= "         AND salas.status = 1                                              ";
        $sSQLReserva .= "    ORDER BY  salas_reservas.data,salas_reservas.hora;                     ";

        $rsSQLReserva = $this->db->query($sSQLReserva);
        return $rsSQLReserva->result();

    }

}
