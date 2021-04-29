<?php
	namespace Models\Countries;
	use Services\db;
	class Country
	{
		private $id;
		private $countryName;
		private $capitalName;
		private $population;
		
		public function __construct ($countryName, $capitalName, $population)
		{
			$this ->countryName = $countryName;
			$this ->capitalName = $capitalName;
			$this ->population = $population;
		}
		
		private function getCountryName() :string
		{
			return $this->countryName;
		}
		private function getCapitalName() :string
		{
			return $this->capitalName;
		}
		private function getPopulation() :int
		{
			return $this->population;
		}
		public function save()
		{
			$db = db::getInstance();
			$values = [$this->countryName, $this->capitalName, $this->population];
			$sql = "INSERT INTO Countries(countryName, countryCapital, population) values (?, ?, ?)";
			$statement = $db->pdo->prepare($sql);
			$statement->execute($values);
			$this->id = $db->pdo->lastInsertId();
		}
		static function getAll () 
		{
			$db = db::getInstance();
			$query = $db->pdo->query("SELECT * FROM Countries");
			$result = $query->fetchAll(\PDO::FETCH_OBJ);
			return $result;
		}
		
	}
	
?>