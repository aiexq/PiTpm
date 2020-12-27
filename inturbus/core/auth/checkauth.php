<?php
session_start();
include "core/db/connect.php";
if(isset($_POST['login']) && isset($_POST['password'])){
	$login = trim(htmlspecialchars(stripcslashes($_POST['login'])));
	$password = trim(htmlspecialchars(stripcslashes($_POST['password'])));
	$result = mysqli_query($link, "select * from manager where login_m='$login' and password_m='$password'");
	$row = mysqli_fetch_assoc($result);
	if(!empty($row['empl_nomer'])){
		header("Location: home.php");
		$_SESSION['login'] = $row['empl_nomer'];
		$_SESSION['auth'] = 1;
		$_SESSION['user_type'] = 'manager';
	} else {
		$result = mysqli_query($link, "select * from admin where login_a='$login' and password_a='$password'");
		$row = mysqli_fetch_assoc($result);
		if (!empty($row['id_a'])){
			header("Location: home.php");
			$_SESSION['login'] = $row['id_a'];
			$_SESSION['auth'] = 1;
			$_SESSION['user_type'] = 'admin';
		} else {
			echo "<p style='color:red; font-size: 13px;' >Логин или пароль введены неверно</p>";
		}
	}
}
?>