<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persona extends CI_Controller
{

        public function index()
        {
                $this->load->model('Persona_Model');
                $data['personas'] = $this->Persona_Model->get();
                $this->load->view('index.php', $data);
        }

        public function crear()
        {
                $this->load->view('crear.php');
        }

        public function store()
        {
                $this->load->model('Persona_Model');
                $ci = $this->Persona_Model->save($_POST);
                $this->load->helper('url');
                redirect("http://localhost/pregunta7/index.php/persona/");
        }

        public function editar($ci)
        {
                $this->load->model('Persona_Model');
                $data['persona'] = $this->Persona_Model->get_ci($ci);
                $this->load->view('edit.php', $data);
        }


        public function update($ci)
        {
                $this->load->model('Persona_Model');
                $ci = $this->Persona_Model->update($_POST, $ci);
                echo $ci;
                $this->load->helper('url');
                redirect("http://localhost/pregunta7/index.php/persona/");
        }

        public function eliminar($ci)
        {
                $this->load->model('Persona_Model');
                $resultado = $this->Persona_Model->get_id($ci);
                if (count($resultado) > 0) {
                        $this->Persona_Model->delete($ci);
                        $this->index();
                }
                $this->load->helper('url');
                redirect("http://localhost/pregunta7/index.php/persona/");
        }
}
