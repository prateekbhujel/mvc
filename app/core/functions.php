<?php

function show($stuff)
{
	echo"<pre>";
	print_r($stuff);
	echo"</pre>";
}

function dd($data)
{
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	die;
}

function esc($str)
{
	return htmlspecialchars($str);
}
