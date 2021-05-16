<?php
require_once('../db/dbhelper.php');
require_once('../db/utility.php');

$token = '';
if(isset($_COOKIE['token'])) {
	$token = $_COOKIE['token'];

	$sql = "UPDATE users set token = null where token = '$token'";
	execute($sql);
}

setcookie('token', '', time() - 100, '/');

header('Location: login.php');