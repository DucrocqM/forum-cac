<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Theme extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		echo $this->twig->render('header');
		$data['themes'] = json_decode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('theme', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	function creer()
	{
		echo $this->twig->render('header');
		$data['themes'] = json_encode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('theme_creer', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	public function sauvegarder()
	{
		$themes = json_decode(file_get_contents('donnees/themes.json'), true);
		$themes[] = array('titre' => $_POST['titre'], 'soustitre' => $_POST['soustitre']);
		file_put_contents(getcwd() . '/donnees/themes.json', (json_encode($themes, JSON_PRETTY_PRINT)));
	}
	function modifier()
	{
		echo $this->twig->render('header');
		$data['themes'] = json_encode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('theme_modif', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
}
