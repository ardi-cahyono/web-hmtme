<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Database Alumni Teknik Metalurgi UPN "Veteran" Yogyakarta';
		$this->load->view('templates/landing-page', $data);
	}
}
