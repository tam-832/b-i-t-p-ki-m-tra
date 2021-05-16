<?php
require_once('../db/dbhelper.php');

$databaseSql = 'create database if not exists '.DATABASE;
initDB($databaseSql);

$userSql = 'create table if not exists users (
				id int primary key auto_increment,
				fullname varchar(50) not null,
				email varchar(200) unique,
				password varchar(32),
				token varchar(32)
			)';
execute($userSql);

$productSql = 'create table if not exists products (
				id int primary key auto_increment,
				title varchar(200),
				thumbnail varchar(500),
				content text,
				price float,
				created_at datetime,
				updated_at datetime,
				id_user int references users (id)
			)';
execute($productsSql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Init database - page</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="text-align: center;">Init database & tables successfully!!!</h1>
</body>
</html>