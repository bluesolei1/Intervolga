<?php
	namespace models\countries;
	use services\db;
	class country
	{
		protected $id;
		protected $countryName;
		protected $countryCapitalName;
		protected $countryPopulation;
		
		public function __construct (string $countryName, string  $countryCapitalName, float $countryPopulation)
		{
			$this ->countryName = $countryName;
			$this ->countryCapitalName = $countryCapitalName;
			$this ->countryPopulation = $countryPopulation;
		}
		
		public function getCountryName() :string
		{
			return $this->countryName;
		}
		public  function getcountryCapitalName() :string
		{
			return $this->countryCapitalName;
		}
		public function getcountryPopulation() :float
		{
			return $this->countryPopulation;
		}
		
		public function setCountryName(string $countryName) 
		{
			$this->countryName = $countryName;
		}
		public function setCountryCapital(string $countryCapitalName)
		{
			$this->countryCapital = $countryCapitalName;
		}
		public function setCountryPopulation(float $countryPopulation) 
		{
			$this->countryPopulation = $countryPopulation;
		}		
		public function save()
		{
			$db = db::getInstance();
			$values = [$this->countryName, $this->countryCapitalName, $this->countryPopulation];
			$sql = "INSERT INTO Countries(countryName, countryCapitalName, countryPopulation) values (?, ?, ?)";
			$db->query ($sql, $values);
			$this->id = $db->pdo->lastInsertId();
		}
		static function getAll() 
		{
			$db = db::getInstance();
			$result = $db->query("SELECT * FROM Countries");
			return $result;
		}		
	}
	
?>