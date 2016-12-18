<?php
class Sala_model extends CI_Model {

    public function __construct(){

    }

    public function getSala(){

        $sSQL  ="     SELECT *         ";
        $sSQL .="       FROM salas;    ";

        $rsSQL = $this->db->query($sSQL);
        return $rsSQL->result();

    }

    public function setDeletarSala(){

        $aData = array('estado'                      => 2,
                       'data_atualizacao'            => now());

        $this->db->where('id', $this->input->post('salas'));
        return $this->db->update('salas', $aData);

    }

    public function setSala(){

        $aData = array('sala'     => $this->input->post('sala'),
                       'detalhes' => $this->input->post('detalhes'));
        return $this->db->insert('salas', $aData);

    }

    public function setReserva(){

        $aData = array('sala'     => $this->input->post('sala'),
                       'descricao' => $this->input->post('assunto'));
        return $this->db->insert('salas_reservas', $aData);

    }

    public function setDeletarReserva(){

        $aData = array('estado'                      => 2,
                       'data_atualizacao'            => now());

        $this->db->where('id', $this->input->post('salas'));
        return $this->db->update('salas_reservas', $aData);

    }


}
