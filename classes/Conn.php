<?php


class Conn
{
	private $dsn = "mysql:host=localhost;dbname=login;charset=utf8";
	private $user = "root";
	private $pass = "";

	public function conexao()
	{
		try{

			$conn = new PDO($this->dsn, $this->user, $this->pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
            echo $e->getMessage();
		}

		return $conn;
	}
}
