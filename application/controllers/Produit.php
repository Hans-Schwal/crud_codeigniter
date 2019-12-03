<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

	public function page1()
	{
        //$this->load->helper("url");
        $data["compteur"] = 66;
        $data["message"] = "bonjour";

		$this->load->view("header");
		$this->load->view("produit/page1", $data);
		$this->load->view("footer");
    }
    
    public function page2()
	{
		$this->load->view("header");
		$this->load->view("produit/page2");
		$this->load->view("footer");
    }
    
    public function page3()
	{
		$this->load->view("header");
		$this->load->view("produit/page3");
		$this->load->view("footer");
	}

		
public function liste()	
{
    /* ANCIEN CODE 
    $this->load->database();
    $requete = $this->db->query('SELECT * FROM produits');
    $aView["liste"] = $requete->result();
    */
    // NOUVEAU CODE 
    // On charge le modèle 'produits_model'
    $this->load->model('produits_model');
    // On appelle la méthode liste() du modèle,
    // qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau) 
    // remarque la syntaxe $this->nom_modele->methode()       
    $aListe = $this->produits_model->liste();
    $aView["liste"] = $aListe;
    $this->load->view('liste', $aListe);	
    // -- fin NOUVEAU CODE
	}  

}
