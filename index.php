<?php
	use \models\countries\country as country;
	function AutoLoader(string $className)
	{
			require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	//$Germany= new country ("Germany","Berlin",555);
	$countries = \models\countries\country::getAll();
	$view = new views\view ("./templates");
	$view->renderHtml("main.php",["countries"=>$countries]);


?>