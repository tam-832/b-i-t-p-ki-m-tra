<?php
	require_once('../db/dbhelper.php');
 

		$title = $thumbnail = $content = $price = $edit = '';

		if (!empty($_POST)) {
			
			if (isset($_POST['title'])) {
				$title = $_POST['title'];
			}
			if (isset($_POST['authorname'])) {
				$authorname = $_POST['authorname'];
			}
            if (isset($_POST['content'])) {
                $content = $_POST['content'];
            }
			if (isset($_POST['price'])) {
				$price = $_POST['price'];
			}
			if (isset($_GET['id'])) {
				$edit = $_GET['id'];
			}
			if ($eidt == '') {
				$sql = "INSERT INTO products(title, thumbnail, content, price)VALUES('$title', '$thumbnail', '$content', '$price')";
			}
			if ($edit != '') {
				$sql = "UPDATE products SET title = '$title', thumbnail = '$thumbnail', content = '$content' , price = '$price' WHERE id = ".$edit;
			}
			execute($sql);
			header('Location: products.php');
			
			die();
		}

		$id = '';
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = "SELECT * FROM products WHERE id= " .$id;	
			$productsList = executeResult($sql);
		if ($productsList != null && count($productsList) >0) {
			$stt = $productsList[0];
			$title = $stt['title'];
			$authorname = $stt['thumbnail'];
			$price = $stt['content'];
			$nxb = $stt['price'];
		}else {
			$id = '';
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
		<div class="container">
			<h3 class="text-center">Thông tin sản phẩm</h3>
			<form method="POST">
				<div class="form-group">
					<label>TITLE</label>
					<input type="text" name="title" required="true" class="form-control" value="<?=$title?>">
				</div>
				<div class="form-group">
					<label>THUMBNAIL</label>
					<input type="text" name="thumbnail" required="true" class="form-control" value="<?=$thumbnail?>">
				</div>
				<div class="form-group">
					<label>CONTENT</label>
					<input type="text" name="content" required="true" class="form-control" value="<?=$content?>">
				</div>
				<div class="form-group">
					<label>PRICE</label>
					<input type="text" name="price" required="true" class="form-control" value="<?=$price?>">
				</div>
				<button class="btn btn-success">Add product</button>
			</form>
		</div>
</body>
</html>