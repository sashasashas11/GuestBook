<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sasha
 * Date: 28.09.13
 * Time: 15:15
 * To change this template use File | Settings | File Templates.
 */
header("Content-Type: text/html; charset=utf-8");

include_once 'GuestBook.php';

class GuestBookDb
{

	private $db;
	private $user = "root";
	private $password = "";
	private $host = "localhost";
	private $database = "GuestBook";

	public function __construct()
	{
		try {
			$db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->exec("set names utf8");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		$db->query("SET CHARACTER SET utf8");
		$this->db = $db;

	}

	public function select()
	{
		$sql = $this->db->query("SELECT * FROM gb");
		$row = $sql->fetchAll();
		foreach ($row as $rows) {
			$outPut[] = new GuestBook($rows['name'], $rows['email'], $rows['message'], $rows['date']);
		}
		return $outPut;
	}

	public function insert($obj)
	{
		$name = $obj->getName();
		$email = $obj->getEmail();
		$msg = $obj->getMessage();
		$date = $obj->getDate();
		$sql = $this->db->prepare("INSERT INTO gb (name, email, message, date) VALUES (:name, :email, :message, :date)");
		$sql->execute(array('name' => $name, 'email' => $email, 'message' => $msg, 'date' => $date));
	}
}