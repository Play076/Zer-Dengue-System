<?php
class ConnectionDB
{
	private $host;
	private $name;
	private $pswd;
	private $dbname;
	private static $connect;
	//construct method
	function __construct($host, $name, $pswd, $dbname)
	{
		$this->host = $host;
		$this->name = $name;
		$this->pswd = $pswd;
		$this->dbname = $dbname;
	}
	//connection with database insert
	public function callconnect()
	{
		try
		{
			if(is_null(self::$connect))
			{
				self::$connect = new PDO("mysql:host=". $this->host . ";dbname=" . $this->dbname, $this->name, $this->pswd);
			}
			return self::$connect;
		}catch(PDOException $ex)
		{
			echo "Error:" . $ex->getMessage();
		}
	}
}
?>