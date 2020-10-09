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
		echo $this->twig->render('theme_creer', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	function lister()
	{
		echo $this->twig->render('header');
		$data['themes'] = json_decode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('theme_lister', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	function modifier()
	{

		/* comment on récupère le thème que l'on doir modifier ? ------------------------------------------------------------ */
		echo $this->twig->render('header');
		$data['themes'] = json_decode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		/* comment récupérer directement juste les données du thème à modifier ? -------------------------------------------- */
		echo $this->twig->render('theme_modif', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	public function sauvegarder($theme = '') //toujours pour modifier
	{
		$themes = json_decode(file_get_contents('donnees/themes.json'), true);
		//on ajoute une condition, je te laisse l'écrire pour modifier la valeur du tableau si on est dans le cas de modification
		// if modifierclick
		// { $themes[] = array('titre' => $_POST['amodifier.titre'], 'soustitre' => $_POST['amodifier.soustitre']); }
		// else { Shéma de Sauvegarde classique. }
		$themes[] = array('titre' => $_POST['titre'], 'soustitre' => $_POST['soustitre']);
		file_put_contents(getcwd() . '/donnees/themes.json', (json_encode($themes, JSON_PRETTY_PRINT)));
	}

	public function supprimer()
	{
		// supprimer dans le Json Apres confirmation via la pop up.
		//1 - confirmation pop up
		// 2 Récup de la réponse, si Oui
		// 3 supprimer dans le json
		// Si non 3 - Avorter l'opération.
	}
}
