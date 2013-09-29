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
	private $login = "root";
	private $password = "";
	private $host = "localhost";
	private $database = "GuestBook";

	public function __construct()
	{
		$host = $this->host;
		$user = $this->login;
		$passwd = $this->password;
		$dbname = $this->database;
		$link = mysql_pconnect($host, $user, $passwd) or die('Could not connect to database');
		mysql_select_db($dbname) or die('Could not select database');
		mysql_query("SET NAMES utf8");
		mysql_query("SET CHARACTER SET utf8");
		return $link;
	}

	public function select()
	{
		$sql = mysql_query("SELECT * FROM gb");
		while ($rows = mysql_fetch_array($sql)) {
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

		$sql = mysql_query("INSERT INTO gb (name, email, message, date) VALUES('$name', '$email', '$msg', '$date')") or die("Error Insert");
	}
}