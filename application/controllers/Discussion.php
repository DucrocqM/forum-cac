<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discussion extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		echo $this->twig->render('header');
		$data['discussion'] = json_decode(file_get_contents('donnees/discussion.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('discussion', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
}
