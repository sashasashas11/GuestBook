<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sasha
 * Date: 28.09.13
 * Time: 15:11
 * To change this template use File | Settings | File Templates.
 */

class GuestBook
{
	private $name;
	private $email;
	private $message;
	private $date;

	public function __construct($name, $email, $msg, $date)
	{
		$this->name = $name;
		$this->email = $email;
		$this->message = $msg;
		$this->date = $date;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDate()
	{
		return $this->date;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getMessage()
	{
		return $this->message;
	}
}