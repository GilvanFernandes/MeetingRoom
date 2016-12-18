<?php
class Login_model extends CI_Model {

    public function __construct(){
        
    }

    public function getValidacao(){

        $sSQLUsuario  = "     SELECT pessoas_usuarios.id,                              ";
        $sSQLUsuario .= "            nome_completo,                                    ";
        $sSQLUsuario .= "            email,                                            ";
        $sSQLUsuario .= "            pessoas_id,                                       ";
        $sSQLUsuario .= "            nome_completo_razao_social as empresa             ";
        $sSQLUsuario .= "       FROM pessoas_usuarios                                  ";
        $sSQLUsuario .= " INNER JOIN pessoas ON pessoas.id = pessoas_id                ";
        $sSQLUsuario .= "      WHERE email = '".$this->input->post('email')."'         ";
        $sSQLUsuario .= "        AND senha = '".sha1($this->input->post('senha'))."'   ";
        $sSQLUsuario .= "        AND pessoas_usuarios.estado = 1;                      ";

        $rsQuery = $this->db->query($sSQLUsuario);
        return $rsQuery->result();        

    }
}