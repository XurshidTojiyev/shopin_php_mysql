<?php
	include("functions.php");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		insert_fv($id);
		header("Location: index.php");
	}

?>