<?php
	namespace Models\Countries;
	class Country
	{
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
		public function save($values)
		{
			 
			}
		
	}
$russia = new Country ("Russia","moscow",9000);
var_dump($russia);
?>