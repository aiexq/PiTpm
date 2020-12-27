<?php 
session_start();
if(isset($_POST['update_worker'])){
	include "../db/connect.php";
	$fio = $_POST['fio'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$doljnost = $_POST['doljnost'];
	$specialnost = $_POST['specialnost'];
	$education = $_POST['education'];
	$exp = $_POST['exp'];
	$empl_nomer = $_POST['update_worker'];
	$result = mysqli_query($link,
		"update employee set fio_e='$fio', birthday_e='$birthday', phone=$phone, doljnost='$doljnost', specialnost='$specialnost', education='$education', exp=$exp where empl_nomer=$empl_nomer");
	header("Location: ../../administrator/search_worker.php");
	unset($_POST['update_worker']);
}
if(isset($_POST['update_abonement'])){
	include "../db/connect.php";
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$srok = $_POST['srok'];
	$abon_number = $_POST['update_abonement'];
	$result = mysqli_query($link,
		"update abonement set abon_name='$name', description='$description', price=$price, srok_abon=$srok where abon_number=$abon_number");
	header("Location: ../../administrator/abonement.php");
	unset($_POST['update_abonement']);
}
if(isset($_POST['update_client_a'])){
	include "../db/connect.php";
	$fio_cl = $_POST['fio'];
	$phone_cl = $_POST['phone'];
	$birthday_cl = $_POST['birthday'];
	$access = $_POST['access'];
	$id = $_POST['update_client_a'];
	$result = mysqli_query($link, "update client set fio_cl='$fio_cl', phone_cl=$phone_cl, birthday_cl='$birthday_cl', access=$access where id_cl=$id");
	header("Location: ../../administrator/search_client.php");
	unset($_POST['update_client']);
}
if(isset($_POST['update_client_m'])){
	include "../db/connect.php";
	$fio_cl = $_POST['fio'];
	$phone_cl = $_POST['phone'];
	$birthday_cl = $_POST['birthday'];
	$access = $_POST['access'];
	$id = $_POST['update_client_m'];
	$result = mysqli_query($link, "update client set fio_cl='$fio_cl', phone_cl=$phone_cl, birthday_cl='$birthday_cl', access=$access where id_cl=$id");
	header("Location: ../../manager/search_client.php");
	unset($_POST['update_client']);
}
?>