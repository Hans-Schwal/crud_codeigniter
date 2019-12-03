<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function liste()
	{
		//$this->output->enable_profiler(TRUE);
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
			//$this->output->enable_profiler(TRUE);
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
			//$this->output->enable_profiler(TRUE);
			$tab = $this->input->post();
			$this->db->query("insert into artist (artist_name) values (?)", array($name));
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

	public function supprim($id)
	{
		if ($this->input->post()) {
			$tab = $this->input->post();
			// Les deux requêtes suivantes sont équivalentes: la première est une requête en PHP natif, la seconde en CodeIgniter.
			//$this->db->query("delete from artist where artist_id=?", array($id));
			$this->db->delete('artist', array('artist_id' => $id)); 
			redirect(site_url("crud/liste"));
		}
		else {
			$data["artist"] = $this->db->query("select * from artist where artist_id=?", array($id))->row();

			$this->load->view("header");
			$this->load->view("crud/supprim", $data);
			$this->load->view("footer");
		}
	}

	public function listeDisc()
	{
		//$this->output->enable_profiler(TRUE);
        $requete = $this->db->query("select * from disc");
        $data["listeDisc"] = $requete->result();
		$this->load->view("header");
		$this->load->view("crud/listeDisc", $data);
		$this->load->view("footer");
	}

	public function detailDisc($id)
	{
        $requete = $this->db->query("select * from disc where disc_id=?", array($id));
        $data["disc"] = $requete->row();
		$this->load->view("header");
		$this->load->view("crud/detailDisc", $data);
		$this->load->view("footer");
    }
	
	public function ajoutDisc()
	{
		// $this->form_validation->set_rules('disc_name', 'Nom de l\'album', 'required');
		//$this->form_validation->set_rules('disc_url', 'Adresse du site', 'regex_match[/^[a-z]+$/]');
		//$this->form_validation->set_rules(
			//'disc_name', 
			//'Le nom de l\'album',
			//'required|min_length[1]|max_length[255]|is_unique[disc.disc_name]',
			//array(
					//'required'      => 'You have not provided %s.',
					//'is_unique'     => 'Le nom est deja utilise.',
					//'max_length'     => '%s est trop <b>long</b>'
			//)
		//);

		$this->load->helper('form');
		$this->load->library('form_validation');
		// Chargement de la librairie 'Upload'
		$this->load->library('upload');

		// On créé un tableau de configuration pour l'upload
    	$config['upload_path'] = './images/'; // chemin où sera stocké le fichier
    	$config['file_name'] = ' '; // nom du fichier final
		$config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)
		
    	// On charge la librairie 'upload' de CodeIgniter en lui envoyant la config
    	$this->load->library('upload');

   		// On initialise la config 
		 $this->upload->initialize($config);
		 
		// La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) et si OK renomme et déplace le fichier tel que configuré
		if ( ! $this->upload->do_upload('disc_picture')) 
		{
     	// Echec : on récupère les erreurs dans une variable (une chaîne)
     	$errors = $this->upload->display_errors();    
     	// on réaffiche la vue du formulaire en passant les erreurs 
     	$aView["errors"] = $errors;
     	$this->load->view('crud/ajoutDisc', $aView);
		}	
		else	
		{ // Succès, on redirige sur la liste 	
			redirect('crud/listeDisc');	
		}  

		if ($this->input->post()){ //&& $this->form_validation->run()) {
			//$this->output->enable_profiler(TRUE);
			$tab = $this->input->post();
			//$this->db->query("insert into disc (disc_name) values (?)", array($name));
			$this->db->insert("disc", $tab);
			redirect(site_url("crud/listeDisc"));
		}
		else {
			$this->load->view("header");
			$this->load->view("crud/ajoutDisc");
			$this->load->view("footer");
		}
	}

	public function supprimDisc($id)
	{
		if ($this->input->post()) {
			$tab = $this->input->post();
			// Les deux requêtes suivantes sont équivalentes: la première est une requête en PHP natif, la seconde en CodeIgniter.
			//$this->db->query("delete from artist where artist_id=?", array($id));
			$this->db->delete('disc', array('disc_id' => $id)); 
			redirect(site_url("crud/listeDisc"));
		}
		else {
			$data["disc"] = $this->db->query("select * from disc where disc_id=?", array($id))->row();

			$this->load->view("header");
			$this->load->view("crud/supprimDisc", $data);
			$this->load->view("footer");
		}
	}
	
}
