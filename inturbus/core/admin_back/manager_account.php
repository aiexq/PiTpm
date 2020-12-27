<?php 
session_start();
if(isset($_POST['create'])){
	include "../db/connect.php";
	$empl_nomer = $_POST['empl_nomer'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$result = mysqli_query($link,"insert into manager(login_m, password_m, email, empl_nomer) values('$login', '$password', '$email',  $empl_nomer)");
	unset($_POST['delete']);
	header("Location: ../../administrator/stat_manager.php");
	
}
?>