<?php
	use \models\countries\country as country;
	function AutoLoader(string $className)
	{
		require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	$view = new views\view ("./templates");
	
	if($_SERVER["REQUEST_METHOD"] == "POST") // получаем данные из формы, при наличии ошибок выдает json с их списком
	{
		$errors = [];
		if (!preg_match("~^[a-zA-Za-яА-ЯёЁ]+( [a-zA-Za-яА-ЯёЁ]+)*$~",$_POST["countryName"]))
		{
			$errors["countryName"] = 'Поле "Страна" должно содержать только буквы и пробелы';
		}
		if (!preg_match("~^[a-zA-Za-яА-ЯёЁ]+( [a-zA-Za-яА-ЯёЁ]+)*$~",$_POST["countryCapitalName"]))
		{
			$errors["countryCapitalName"] = 'Поле "Столица" должно содержать только буквы и пробелы';
		} 
		if (!is_numeric($_POST["countryPopulation"]))
		{
			$errors["countryPopulation"] = 'Поле "Население" должно содержать только цифры';
		} 
		if (empty($errors))
		{
			$country = new country ($_POST["countryName"],$_POST["countryCapitalName"],$_POST["countryPopulation"]);
			$country->save();
		}
		else 
		{
			echo json_encode($errors); // элемент => ошибка
			die;
		}
	}
	$countries = country::getAll();
	$view->renderHtml("main.php",["countries"=>$countries]);
	
	
	
?>