<?php
	use \models\countries\country as country;
	function AutoLoader(string $className)
	{
		require_once __DIR__ . '..\\' . str_replace('\\', '/', $className) . '.php';
	}
	spl_autoload_register('AutoLoader');
	
	function whitespaceTrim (string $string)
	{
		$string =preg_replace("~\s{2,}~" ," ",rtrim(ltrim($string))); // удаляем пробелы в начале и в конце строки, а также два и более пробела между словами
		return $string;
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") // получаем данные из формы, при наличии ошибок выдает json с их списком
	{
		$errors = [];
		$regexpString = "~^[a-zA-Za-яА-ЯёЁ]+( [a-zA-Za-яА-ЯёЁ]+)*$~"; // слова  RU + ENG плюс пробелы между ними
		$maxWordLength = 120; 	// в шаблоне ввод ограничен 60 символами, но т.к. кириллица идет за два символа, то на стороне сервера ограничим 120
		$_POST["countryName"] = whitespaceTrim ($_POST["countryName"]);
		$_POST["countryCapitalName"] = whitespaceTrim ($_POST["countryCapitalName"]);
		$_POST["countryPopulation"] = whitespaceTrim ($_POST["countryPopulation"]);	
		if (!preg_match($regexpString ,$_POST["countryName"]))
		{
			$errors[] = ["countryName"=>'Поле "Страна" должно содержать только буквы и пробелы'];
		}
		if (strlen($_POST["countryName"])>$maxWordLength)   
		{
			$errors[] = ["countryName"=>'Поле "Страна" может содержать максимум 60 символов'];
		}
		if (!preg_match($regexpString ,$_POST["countryCapitalName"]))
		{
			$errors[] = ["countryCapitalName"=>'Поле "Столица" должно содержать только буквы и пробелы'];
		} 
		if (strlen($_POST["countryCapitalName"])>$maxWordLength)
		{
			$errors[] = ["countryCapitalName"=>'Поле "Столица" может содержать максимум 60 символов'];
		}
		if (!is_numeric($_POST["countryPopulation"]))
		{
			$errors[] = ["countryPopulation"=>'Поле "Население" должно содержать только цифры'];
		} 
		if (strlen($_POST["countryPopulation"])>11)
		{
			$errors[] = ["countryPopulation"=>'Поле "Население" может содержать максимум 11 символов'];
		}
		if (empty($errors))  // если ошибок нет, создаем страну и сохраняем в бд
		{
			$country = new country ($_POST["countryName"], $_POST["countryCapitalName"], $_POST["countryPopulation"]);
			$country->save();
		}
		else 
		{
			echo json_encode($errors); // элемент ввода => ошибка
			die;
		}
	}
	$countries = country::getAll();
	$view = new views\view ("./templates");
	$view->renderHtml("main.php",["countries"=>$countries]);
	
	
	
?>