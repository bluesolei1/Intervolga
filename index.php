<?php
	
	function AutoLoader(string $className)
	{
	echo $className.'<br>';
			require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	$France= new \Models\Countries\Country ("France","Paris",4444);
	$France->save();

	var_dump(\Models\Countries\Country::getAll());
?>