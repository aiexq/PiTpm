<?php 
session_start();
if(isset($_POST['addclient'])){
	include "../core/db/connect.php";
	$fio = $_POST['fio'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$access = 0;
	$result = mysqli_query($link,"insert into client(fio_cl, phone_cl, birthday_cl, access) values('$fio', $phone, '$birthday', $access)");
	unset($_POST['addclient']);
	if ($result==true){
		echo "<p class='text-center' style='color:green; font-size: 13px;' >Клиент добавлен</p>";
	} else {
		echo "<p class='text-center' style='color:red; font-size: 13px;' >Ошибка сервера! Не удалось выполнить запрос</p>";
	}
}
?>