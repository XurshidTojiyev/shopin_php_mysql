<?php
	include("connect.php");
	function get_products() {
		$connect = $GLOBALS['connect'];
		$result = $connect->query("SELECT * FROM `products`");
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function insert_data($title, $price, $cdn, $category, $admin) {
		$connect = $GLOBALS['connect'];
		$result = $connect->query("INSERT INTO `products`(`id`, `title`, `price`, `image_cdn`, `category`, `whoadmin`) VALUES (NULL,'$title','$price','$cdn','$category','$admin')");
	}

	function insert_fv($id) {
		$connect = $GLOBALS['connect'];
		$result = $connect->query("INSERT INTO `favourites`(`id`)VALUES('$id');");
	}

	function remove_product($id) {
		$connect = $GLOBALS['connect'];
		$connect->query("DELETE FROM `products` WHERE `id` = '$id'");
		header("Location: index.php");
	}

	function get_fvs_data() {
		$connect = $GLOBALS['connect'];
		$result = $connect->query("SELECT * FROM `favourites`");
		while($row = mysqli_fetch_assoc($result)) {
			$dt = $row['id'];
			$data[] = $dt;
		}
		$data_all = get_products();
		foreach ($data as $dt1) {
			foreach($data_all as $dtt) {
				if($dtt['id'] == $dt1) {
					$data_fav[] = $dtt;
				}
			}
		}
		return $data_fav;
	}

?>