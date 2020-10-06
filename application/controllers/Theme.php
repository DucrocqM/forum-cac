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

	// je t'explique en quelques mots comment on peut faire
	// c'est une méthode souvent utiliser pour avoir un formulaire créer et modifier qui soit identique
	// pour créer un thème comme d'abithude
	// pour le modifier on affiche un nouvea utwig qui affiche la liste des thèmes
	// ensuite quand l'utilisateur à choisi on l'envoie sur  créer mais on ajoute une variable pour dire à créer que l'on est en train de modifier un thème existant
	// ensuite crtéer envoie sur sauvegarder qui doit lui aussi avoir une valeur pour savoir qu'il sauvegarde un thème déja existant.
	// tu verras je t'ai mis des commentaires partout

	// on peut imaginer d'autres méthodes, c'est ce que l'on fera pour modifier les forums
	// n'oublie pas que le but de ce projet est que tu apprennes des techniques ;-)
	// donc on essai de voir le maximum de choses et des façons différentes de faire

	function modifier()
	{
		//c'est pas bon ;-)
		//récupérer les données du json

		//on affiche un formulaire avec la liste des thèmes pour que l'utilisateur choisisse un thème à modifier

		//ça envoie à créer (et oui, on ajoute à créer une variable optionnelle avec le nom du thème)
		//regarde j'ai modifier créer

		echo $this->twig->render('header');
		$data['themes'] = json_encode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		echo $this->twig->render('theme_modif', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	//avant la function creer() cette function ne pouvait que créer
	//maintenant elle sait modifier
	function creer($theme = '') //si on envoie une valeur par /theme/creer/ecologie par exemple
	{
		echo $this->twig->render('header');
		$data['themes'] = json_encode(file_get_contents('donnees/themes.json')); //on mets les donnes du fichier dans une variable
		//on dis $data['amodifier']=$theme comme cela on envoie cette variable au twig
		//regarde dans le twig

		echo $this->twig->render('theme_creer', $data); //on envoie les données au twig
		echo $this->twig->render('footer');
	}
	public function sauvegarder($theme = '') //toujours pour modifier
	{
		$themes = json_decode(file_get_contents('donnees/themes.json'), true);
		//on ajoute une condition, je te laisse l'écrire pour modifier la valeur du tableau si on est dans le cas de modification
		$themes[] = array('titre' => $_POST['titre'], 'soustitre' => $_POST['soustitre']);
		file_put_contents(getcwd() . '/donnees/themes.json', (json_encode($themes, JSON_PRETTY_PRINT)));
	}
}
