<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Test class
 */
class Test
{
	use MainController;

	public function index()
	{

		$this->view('test');
	}

}
