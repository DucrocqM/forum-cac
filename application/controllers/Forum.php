<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('twig');
	}


	public function index()
	{
		echo $this->twig->render('header');
		$data['forums'] = json_decode(file_get_contents('donnees/forums.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('forum', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	function creer()
	{
		echo $this->twig->render('header');
		$data['forums'] = json_encode(file_get_contents('donnees/forums.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('forum_creer', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	public function sauvegarder()
	{
		$themes = json_decode(file_get_contents('donnees/forums.json'), true);
		$themes[] = array('titre' => $_POST['titre'], 'soustitre' => $_POST['soustitre']);
		file_put_contents(getcwd() . '/donnees/forums.json', (json_encode($themes, JSON_PRETTY_PRINT)));
	}
}