<?php
	namespace models\countries;
	use services\db;
	class country
	{
		protected $id;
		protected $countryName;
		protected $countryCapital;
		protected $countryPopulation;
		
		public function __construct (string $countryName, string  $countryCapital,int $countryPopulation)
		{
			$this ->countryName = $countryName;
			$this ->countryCapital = $countryCapital;
			$this ->countryPopulation = $countryPopulation;
		}
		
		public function getCountryName() :string
		{
			return $this->countryName;
		}
		public  function getcountryCapital() :string
		{
			return $this->countryCapital;
		}
		public function getcountryPopulation() :int
		{
			return $this->countryPopulation;
		}
		
		public function setCountryName(string $countryName) 
		{
			$this->countryName = $countryName;
		}
		public function setCountryCapital(string $countryCapital)
		{
			$this->countryCapital = $countryCapital;
		}
		public function setCountryPopulation(int $countryPopulation) 
		{
			$this->countryPopulation = $countryPopulation;
		}		
		public function save()
		{
			$db = db::getInstance();
			$values = [$this->countryName, $this->countryCapital, $this->countryPopulation];
			$sql = "INSERT INTO Countries(countryName, countryCapital, countryPopulation) values (?, ?, ?)";
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