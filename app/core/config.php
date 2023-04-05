<?php


if($_SERVER['SERVER_NAME'] == 'localhost')
{

	define('ROOT', 'http://localhost/mvc/public');
}
else
{

	define('ROOT', 'https://www.yourwebsite.com');
}