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

?>