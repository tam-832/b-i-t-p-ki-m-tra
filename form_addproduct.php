<?php 
	require_once('../db/dbhelper.php');
    require_once('../db/utility.php');

    $user = validateToken();
    if($user == null) {
        header('Location: ../users/login.php');
        die();
    }

    $sql = "SELECT products.*, users.fullname from products, users where products.id_user = users.id and products.id_user = ".$user['id'];
    $dataList = executeResult($sql);

	$delete = '';
	if (isset($_GET['id'])) {
		$delete = $_GET['id'];

		if ($delete != '') {
			$sql = 'delete from products where id= '.$delete;
		}
		execute($sql);
		header('Location: products.php');
		 die();
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADDPRODUCS FORM</title>
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
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Updated At</th>
                        <th>Owner By</th>
                        <th style="width: 50px"></th>
                        <th style="width: 50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 1;
                            foreach ($dataList as $item) {
                                echo '<tr>
                                <td>'.(++$count).'</td>
                                <td><img src="'.$item['thumbnail'].'" style="width: 160px;"/></td>
                                <td>'.$item['title'].'</td>
                                <td>'.$item['price'].'</td>
                                <td>'.$item['updated_at'].'</td>
                                <td>'.$item['fullname'].'</td>
                                        <td><button class="btn btn-dark" onclick= window.open("addproduct.php?id='.$item['id'].'","_self")>EDIT</button></td>
                                        <td><button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">DELETE</button></td>
                                    </tr>';	
                                    } 
                    ?>
                </tbody>
            </table>
    </div>
		<script type="text/javascript">
			function deleteProduct(x) {
				if (confirm('Bạn có muốn xóa quyển sách này không')) {

					window.open("form_addproduct.php?id=" + x, "_self")
				}
				
			}
		</script>
</body>
</html>