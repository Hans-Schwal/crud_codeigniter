<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function liste()
	{
		$this->output->enable_profiler(TRUE);

        $requete = $this->db->query("select * from artist");

        $data["liste"] = $requete->result();

		$this->load->view("header");
		$this->load->view("crud/liste", $data);
		$this->load->view("footer");
    }
    
    public function detail($id)
	{
        $requete = $this->db->query("select * from artist where artist_id=?", array($id));

        $data["artist"] = $requete->row();


		$this->load->view("header");
		$this->load->view("crud/detail", $data);
		$this->load->view("footer");
    }
    
    public function ajout()
	{
		// $this->form_validation->set_rules('artist_name', 'Nom de l\'artist', 'required');
		$this->form_validation->set_rules('artist_url', 'Adresse du site', 'regex_match[/^[a-z]+$/]');

		$this->form_validation->set_rules(
			'artist_name', 
			'Le nom de l\'artiste',
			'required|min_length[5]|max_length[12]|is_unique[artist.artist_name]',
			array(
					'required'      => 'You have not provided %s.',
					'is_unique'     => 'Le nom est deja utilise.',
					'max_length'     => '%s est trop <b>long</b>'
			)
		);

		if ($this->input->post() && $this->form_validation->run()) {

			$this->output->enable_profiler(TRUE);

			$tab = $this->input->post();

			//$this->db->query("insert into artist (artist_name) values (?)", array($name));

			$this->db->insert("artist", $tab);
	
			redirect(site_url("crud/liste"));
		}
		else {
			$this->load->view("header");
			$this->load->view("crud/ajout");
			$this->load->view("footer");
		}
	}

	public function modif($id)
	{
		if ($this->input->post()) {
			
			$this->output->enable_profiler(TRUE);

			$tab = $this->input->post();

			//$this->db->query("insert into artist (artist_name) values (?)", array($name));

			$this->db->update("artist", $tab, "artist_id=$id");
	
			redirect(site_url("crud/liste"));
		}
		else {
			$data["artist"] = $this->db->query("select * from artist where artist_id=?", array($id))->row();

			$this->load->view("header");
			$this->load->view("crud/modif", $data);
			$this->load->view("footer");
		}
	}
}
