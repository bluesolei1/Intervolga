<?php
	use \models\countries\country as country;
	function AutoLoader(string $className)
	{
	echo $className.'<br>';
			require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	$Germany= new country ("Germany","Berlin",4444);
	//$Germany->save();

	var_dump(country::getAll());
?>