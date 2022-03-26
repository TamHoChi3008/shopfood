<?php
	session_start();
	$id = $_GET['id'];
	if(isset($_SESSION['add_cart'][$id])){
		unset($_SESSION['add_cart'][$id]);
	}
	header("location: view_cart.php");
?>