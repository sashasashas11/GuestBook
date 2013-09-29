<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sasha
 * Date: 28.09.13
 * Time: 18:06
 * To change this template use File | Settings | File Templates.
 */
//require_once 'addMessage.html';
require_once 'GuestBook.php';
require_once 'GuestBookDb.php';

if (isset($_REQUEST['submit']))
{
	$msg = $_POST['msg'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$date = date("y-m-d H:i:s");
	$db = new GuestBookDb();
	$obg = new GuestBook($name, $email, $msg, $date);
	$db->insert($obg);
}

$db = new GuestBookDb();
$obgList = $db->select();
require_once 'list.php';



