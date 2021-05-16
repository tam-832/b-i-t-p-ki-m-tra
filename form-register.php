<?php
$fullname = $email = $password = '';
if(!empty($_POST)) {
	$fullname = getPost('fullname');
	$email = getPost('email');
	$password = getPost('password');

	//Kiem tra thanh cong mat khau da khop
	if(!empty($password) && !empty($email)) {
		//Kiem tra username & email <> null -> check bao mat phia server
		//Xem username va email da ton tai trong database
		$sql = "select * from users where email = '$email'";
		$result = executeResult($sql);
		// var_dump($result);
		if($result != null && sizeof($result) > 0) {
			//Tai khoan da ton tai trong database
		} else {
			//Kiem tra moi thong tin da ok -> insert database
			// echo $password.'<br/>';
			$password = getMD5Security($password);
			// echo $password;die();

			$sql = "INSERT into users(email, fullname, password) values ('$email', '$fullname', '$password')";
			execute($sql);

			header('Location: login.php');
			die();
		}
	}
}