<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Persona_Model extends CI_Model {

    public $ci;
    public $nombre_completo;
    public $fecha_nacimiento;
    public $departamento;

    public function __construct(){
        parent::__construct();
    } 
    public function get_ci($ci){
        $this->load->database();
        $query=$this->db->query("select * from persona where ci=$ci");
        return $query->result();
    }
    
    
    public function get()
    {
        $this->load->database();
        $query=$this->db->query("select * from persona");
        return $query->result();
    }

    public function save($persona)
    {
        $this->load->database();
        $this->db->insert('Persona',$persona);
        return $this->db->insert_id();
    }

    public function update($persona,$ci)
    {
        $this->load->database();
        $this->db->where('ci',$ci);
        return $this->db->update('Persona',$persona);
    }
    public function delete($id){

        $this->load->database();
        $query=$this->db->query("delete from persona where ci =$ci");
       
    }

}