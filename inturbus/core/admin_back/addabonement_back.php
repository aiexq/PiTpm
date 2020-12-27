<?php 
session_start();
if(isset($_POST['addabonement'])){
	include "../core/db/connect.php";
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$srok = $_POST['srok'];
	$id = $_SESSION['login'];
	$result = mysqli_query($link,"insert into abonement(abon_name, description, price, srok_abon, id_a) values('$name', '$description', $price, $srok, $id) ");
	unset($_POST['addworker']);
	if ($result==true){
		echo "<p class='text-center' style='color:green; font-size: 13px;' >Абонемент Создан</p>";
	} else {
		echo "<p class='text-center' style='color:red; font-size: 13px;' >Ошибка сервера! Не удалось выполнить запрос</p>";
	}
}
?>