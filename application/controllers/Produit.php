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
}
