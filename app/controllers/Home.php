<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Home
{
	use MainController;

	public function index()
	{
		$user = new \Model\User;
		if($user->validate($_POST))
		{
			$user->insert($_POST);
			redirect('login');
		}

		$data['user'] = $user;
		$this->view('home',$data);
	}
}
