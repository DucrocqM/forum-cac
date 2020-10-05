<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Theme extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('twig');
	}


	public function index()
	{
		$this->twig->render('theme.twig');
	}
}