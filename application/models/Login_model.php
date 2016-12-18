<?php
class Login_model extends CI_Model {

    public function __construct(){

    }

    public function getValidacao(){

        $sSQLUsuario  = "     SELECT *             ";
        $sSQLUsuario .= "       FROM usuarios;     ";
        
        $rsQuery = $this->db->query($sSQLUsuario);
        return $rsQuery->result();

    }
}
