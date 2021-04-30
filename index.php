<?php
	use \models\countries\country as country;
	function AutoLoader(string $className)
	{
		require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	$view = new views\view ("./templates");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$country = new country ($_POST["countryName"],$_POST["countryCapital"],$_POST["countryPopulation"]);
		$country->save();
	}
		$countries = country::getAll();
		$view->renderHtml("main.php",["countries"=>$countries]);

	
	
?>