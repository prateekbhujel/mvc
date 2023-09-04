<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
{
	
	use Model;

	protected $table = 'users';
	protected $primaryKey = 'id';

	protected $allowedColumns = [

		'email',
		'password',
		'username'
	];

	/****************************
	 * Rules Include :
	    * required	
		* alpha
		* apha_space
		* email
		* numeric
		* unique
		* symbol
		* not_less_than_8_chars
		* alpha_symbol
		* alpha_numeric
		* alpha_symbol
	 *
	***************************/
		
	protected $validationRules = [

		'email' => [
			'required',
			'email',
			'unique',
		],
		'username' => [
			'required',
			'apha_space',
		],
		'password' => [
			'required',
			'not_less_than_8_chars',
		],
	];

}