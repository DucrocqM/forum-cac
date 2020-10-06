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
		$this->twig->render('header.twig');
		$this->twig->render('discussion.twig');
		$this->twig->render('footer.twig');
	}
}
