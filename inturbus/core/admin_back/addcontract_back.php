<?php 
session_start();
if(isset($_POST['addcontract'])){
	include "../core/db/connect.php";
	date_default_timezone_set("Etc/GMT-3");
	$create_date = date("Y-m-d");
	$fio = $_POST['fio'];
	$birthday = $_POST['birthday'];
	$serija = $_POST['serija'];
	$nomer = $_POST['nomer'];
	$kem_vidan = $_POST['kem_vidan'];
	$data_pasp = $_POST['data_pasp'];
	$adres = $_POST['adres'];
	$inn = $_POST['inn'];
	$snils = $_POST['snils'];
	$doljnost = $_POST['doljnost'];
	$oklad = $_POST['oklad'];
	$start_work = $_POST['start_work'];
	$start_work_contract = $_POST['start_work_contract'];
	$empl_nomer = $_SESSION['empl_nomer'];
	$result = mysqli_query($link,"insert into contract_e(create_date, fio_e, birthday_e, serija_e, nomer_e, kem_vidan_e, data_pasp_e, adres_e, inn, snils, doljnost, oklad, start_work, start_con_date, empl_nomer) values('$create_date', '$fio', '$birthday', $serija, $nomer, '$kem_vidan', '$data_pasp', '$adres', $inn, $snils, '$doljnost', $oklad, '$start_work', '$start_work_contract', $empl_nomer)");
	unset($_POST['contract']);
	if ($result==true){
		$result2 = mysqli_query($link, "select * from contract_e where empl_nomer=$empl_nomer order by con_number_e desc limit 1");
		$dog_nomer = mysqli_fetch_assoc($result2);
		$_SESSION['dog_nomer'] = $dog_nomer['con_number_e'];
		echo "<p class='text-center' style='color:green; font-size: 18px;' >Договор составлен<br> <a href='../core/main_page/ООО_Интурбус_договор_сотрудника.doc' download>Нажмите, чтобы загрузить DOC файл</a></p>";

	} else {
		echo "<p class='text-center' style='color:red; font-size: 13px;' >Ошибка сервера! Не удалось выполнить запрос</p>";
	}
}
?>