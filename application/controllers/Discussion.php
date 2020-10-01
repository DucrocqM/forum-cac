<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discussion extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('twig');
	}


	public function index()
	{
		$this->twig->render('discussion.twig');
	}
}
