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
		$errors = [];
		if (!preg_match("~^[a-zA-Za-яА-ЯёЁ]+$~",$_POST["countryName"]))
		{
			$errors[] = 'Поле "Страна" должно содержать только буквы';
		}
		if (!preg_match("~^[a-zA-Za-яА-ЯёЁ]+$~",$_POST["countryCapital"]))
		{
			$errors[] = 'Поле "Столица" должно содержать только буквы';
		} 
		if (!is_numeric($_POST["countryPopulation"]))
		{
			$errors[] = 'Поле "Население" должно содержать только цифры';
		} 
		if (empty($errors))
		{
			$country = new country ($_POST["countryName"],$_POST["countryCapital"],$_POST["countryPopulation"]);
			$country->save();
		}
		else 
		{
			var_dump ($errors);	
		}
	}
	$countries = country::getAll();
	$view->renderHtml("main.php",["countries"=>$countries]);
	
	
	
?>