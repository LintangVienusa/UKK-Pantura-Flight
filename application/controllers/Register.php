<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function sign_in()
	{
		$this->load->view('v_sign');
	}
}