<?php
class Login_model extends CI_Model {

    public function __construct(){

    }

    public function getValidacao(){

        $sSQLUsuario  = "     SELECT *                                                  ";
        $sSQLUsuario .= "       FROM usuarios                                           ";
        $sSQLUsuario .= "      WHERE email = '".$this->input->post('email')."'          ";
        $sSQLUsuario .= "        AND senha = '".sha1($this->input->post('senha'))."';   ";

        $rsQuery = $this->db->query($sSQLUsuario);
        return $rsQuery->result();

    }
}
