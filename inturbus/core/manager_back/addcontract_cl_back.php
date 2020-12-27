<?php 
session_start();
if(isset($_POST['addcontract_cl'])){
	include "../core/db/connect.php";
	date_default_timezone_set("Etc/GMT-3");
	$create_date = date("Y-m-d");
	$fio = $_POST['fio'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$serija = $_POST['serija'];
	$nomer = $_POST['nomer'];
	$kem_vidan = $_POST['kem_vidan'];
	$data_pasp = $_POST['data_pasp'];
	$adres = $_POST['adres'];
	$abon_number = $_POST['abonement'];
		$abons = mysqli_query($link, "select * from abonement where abon_number=$abon_number");
		$row = mysqli_fetch_assoc($abons);
	$abon_name = $row['abon_name'];
	$srok_abon = $row['srok_abon'];
	$price = $row["price"];
	$workduration = 2;
	$empl_nomer = $_SESSION['login'];
	$id_cl = $_POST['id_cl'];
	$result = mysqli_query($link,"insert into contract_cl(create_date_cl, fio_cl, birthday_cl, phone_cl, serija_cl,	nomer_cl, kem_vidan_cl,	data_pasp_cl, adres_cl, abon_name, srok_abon, price, work_duration,	id_m, abon_number, id_cl) values('$create_date', '$fio', '$birthday', $phone, $serija, $nomer, '$kem_vidan', '$data_pasp', '$adres', '$abon_name', $srok_abon, $price, $workduration, $empl_nomer, $abon_number, $id_cl)");

	unset($_POST['addcontract_cl']);
	if ($result==true){
		$result2 = mysqli_query($link, "select * from contract_cl where id_cl=$id_cl order by con_number_cl desc limit 1");
		$dog_nomer = mysqli_fetch_assoc($result2);
		$_SESSION['dog_nomer'] = $dog_nomer['con_number_cl'];
		echo "<p class='text-center' style='color:green; font-size: 18px;' >Договор составлен<br> <a href='../core/main_page/ООО_Интурбус_договор_клиента.docx' download>Нажмите, чтобы загрузить DOC файл</a></p>";

	} else {
		echo "<p class='text-center' style='color:red; font-size: 13px;' >Ошибка сервера! Не удалось отправить запрос</p>";
	}
}
?>