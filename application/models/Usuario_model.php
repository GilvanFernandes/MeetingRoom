<?php
class Usuario_model extends CI_Model {

    public function __construct(){

    }

    public function getUsuario($iIdUsuario = NULL){

        if(!empty($iIdUsuario) && $iIdUsuario > 0){

            $sSQL  ="     SELECT id,                            ";
            $sSQL .="            nome,                          ";
            $sSQL .="            email,                         ";
            $sSQL .="            CASE adm                       ";
            $sSQL .="               WHEN 1 THEN 'Administrador' ";
            $sSQL .="               ELSE 'Colaborador'          ";
            $sSQL .="            END as adm                     ";
            $sSQL .="       FROM usuarios                       ";
            $sSQL .="      WHERE id = ".$iIdUsuario.";          ";

            $rsSQL = $this->db->query($sSQL);
            return $rsSQL->row();

        }else{

            $sSQL  ="     SELECT id,                            ";
            $sSQL .="            nome,                          ";
            $sSQL .="            email,                         ";
            $sSQL .="            CASE adm                       ";
            $sSQL .="               WHEN 1 THEN 'Administrador' ";
            $sSQL .="               ELSE 'Colaborador'          ";
            $sSQL .="            END as adm                     ";
            $sSQL .="       FROM usuarios                       ";
            $sSQL .="      WHERE status = 1;                    ";

            $rsSQL = $this->db->query($sSQL);
            return $rsSQL->result();

        }



    }

    public function setUsuario(){

        $aData = array('nome'     => $this->input->post('nome'),
                       'email'    => $this->input->post('email'),
                       'senha'    => sha1($this->input->post('senha')),
                       'adm'      => $this->input->post('adm'));
        return $this->db->insert('usuarios', $aData);

    }

    public function setUsuarioDeletar($iIdUsuario){

        $sSQLVerificar  = "      SELECT count(*) AS total                                    ";
        $sSQLVerificar .= "        FROM usuarios                                                ";
        $sSQLVerificar .= "  INNER JOIN salas_reservas ON salas_reservas.usuarios_id = usuarios.id ";
        $sSQLVerificar .= "       WHERE usuarios.id = ".$iIdUsuario.";                             ";
        $rsSQLVerificar = $this->db->query($sSQLVerificar);

        if($rsSQLVerificar->row()->total == 0){

            $aData = array('status'                    => 2,
                           'data_alteracao'            => 'now()');

            $this->db->where('id', $iIdUsuario);
            return $this->db->update('usuarios', $aData);

        }else{

            return false;

        }

    }

    public function setUsuarioAtualizar(){

        $aData = array('email'          => $this->input->post('email'),
                       'senha'          => sha1($this->input->post('senha')),
                       'adm'            => $this->input->post('adm'),
                       'data_alteracao' => 'now()');

        $this->db->where('id', $this->input->post('idado'));
        return $this->db->update('usuarios', $aData);

    }

}
