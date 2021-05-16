<?php
function removeSpecialCharacter($str) {
	$str = str_replace('\\', '\\\\', $str);
	$str = str_replace('\'', '\\\'', $str);
	return $str;
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
	}

	return removeSpecialCharacter($value);
}

function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
	}

	return removeSpecialCharacter($value);
}

function getMD5Security($pwd) {
	return md5(md5($pwd).MD5_PRIMARY_KEY);
}

function validateToken() {
	$token = '';
	if(isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];

		$sql = "SELECT * from users where token = '$token'";
		$result = executeResult($sql, true);

		return $result;
	}

	return false;
}