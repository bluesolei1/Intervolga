<?php
	namespace services;
	class db 
	{
		private static $instance;
		public $pdo;
		private function __construct()
		{
			$options = (require __DIR__ .'\settings.php')['db'];	
			try { 
				$this->pdo = new \PDO('mysql:host='.$options['host'].';dbname='.$options['dbname'],$options['user'],$options['password']);
			}
			catch (\PDOException $e) {	
				if ($e->getCode() == 1049)   // если нет базы данных, то создаем сначала её
				{
					$this->pdo = new \PDO('mysql:host='.$options['host'],$options['user'],$options['password']);
					$this->pdo->exec("CREATE DATABASE ".$options['dbname']);
					$this->pdo->exec("USE ".$options['dbname']);
				}
				else 	die('Error: '.$e->getMessage().' Code: '.$e->getCode());
			}
			$this->checkTableExists();  
		}
		public function checkTableExists()
		{
			//проверяем, если таблица существует, если нет, то создаем
			$st = $this->pdo->prepare( "DESCRIBE `Countries");
			if ( !$st->execute() ) {   
				$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `Countries` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`countryName` varchar(255) NOT NULL,
				`countryCapital` varchar(255) NOT NULL ,
				`countryPopulation` int(255) NOT NULL )"); 
			}
		}
		public function query(string $sql, array $params = []): ?array
		{
			$statement= $this->pdo->prepare($sql);
			$result = $statement->execute($params);
			
			if($result === false)
			{
				return null;
			}
			else 
			{
				return $statement->fetchAll(\PDO::FETCH_CLASS);
			}
		}
		public static function getInstance(): self 
		{
			if (self::$instance === null) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}
?>	