<?php

class Model {

	protected $objOdbc;
	protected $db;
	private $options = array(
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_CASE => PDO::CASE_LOWER,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
	);

	public function __construct(){
		try{
			$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, $this->options);
		}catch (PDOException $e){
			die($e->getMessage());
		}
	}

	protected function Close()
	{
		odbc_close($this->objOdbc);
	}
}