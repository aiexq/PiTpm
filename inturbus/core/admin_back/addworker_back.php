<?php 
session_start();
if(isset($_POST['addworker'])){
	include "../core/db/connect.php";
	$fio = $_POST['fio'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$doljnost = $_POST['doljnost'];
	$specialnost = $_POST['specialization'];
	$education = $_POST['education'];
	$exp = $_POST['experience'];
	$id = $_SESSION['login'];
	$result = mysqli_query($link,"insert into employee(fio_e, birthday_e, phone, doljnost, specialnost, education, exp, id_a) values('$fio', '$birthday', $phone, '$doljnost', '$specialnost', '$education', $exp, $id)");
	unset($_POST['addworker']);
	if ($result==true){
		echo "<p class='text-center' style='color:green; font-size: 13px;' >Сотрудник добавлен</p>";
	} else {
		echo "<p class='text-center' style='color:red; font-size: 13px;' >Ошибка сервера! Не удалось выполнить запрос</p>";
	}
}
?>