<?php
	namespace models\countries;
	use services\db;
	class country
	{
		protected $id;
		protected $countryName;
		protected $countryCapital;
		protected $population;
		
		public function __construct (string $countryName, string  $countryCapital,int $population)
		{
			$this ->countryName = $countryName;
			$this ->countryCapital = $countryCapital;
			$this ->population = $population;
		}
		
		public function getCountryName() :string
		{
			return $this->countryName;
		}
		public  function getcountryCapital() :string
		{
			return $this->countryCapital;
		}
		public function getPopulation() :int
		{
			return $this->population;
		}
		
		public function setCountryName(string $countryName) 
		{
			$this->countryName = $countryName;
		}
		public function setcountryCapital(string $countryCapital)
		{
			$this->countryCapital = $countryCapital;
		}
		public function setPopulation(int $population) 
		{
			$this->population = $population;
		}		
		public function save()
		{
			$db = db::getInstance();
			$values = [$this->countryName, $this->countryCapital, $this->population];
			$sql = "INSERT INTO Countries(countryName, countryCapital, population) values (?, ?, ?)";
			$db->query ($sql, $values);
			$this->id = $db->pdo->lastInsertId();
			echo "saved<br>";
		}
		static function getAll() 
		{
			$db = db::getInstance();
			$result = $db->query("SELECT * FROM Countries");
			return $result;
		}
		
	}
	
?>