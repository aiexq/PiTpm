<?php
header('Content-Type: text/html; charset=utf-8');
header ("Content-Type: \"msword\"");
header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header ("Content-Disposition: attachment; filename= \"Трудовой договор ООО Интурбус.doc\"");
session_start();
include "../db/connect.php";
$dog_nomer = $_SESSION['dog_nomer'];
echo $dog_nomer;
$result = mysqli_query($link, "select * from contract_e where con_number_e=$dog_nomer");
$row = mysqli_fetch_assoc($result);
$create_date = $row['create_date'];
$fio = $row['fio_e'];
$birthday = $row['birthday_e'];
$serija = $row['serija_e'];
$nomer = $row['nomer_e'];
$kem_vidan = $row['kem_vidan_e'];
$data_pasp = $row['data_pasp_e'];
$adres = $row['adres_e'];
$inn = $row['inn'];
$snils = $row['snils'];
$doljnost = $row['doljnost'];
$oklad = $row['oklad'];
$start_work = $row['start_work'];
$start_work_contract = $row['start_con_date'];
echo "$create_date, $fio, $birthday, $serija, $nomer, $kem_vidan, $data_pasp, $adres, $inn, $snils, $doljnost, $oklad, $start_work, $start_work_contract<br><br><br>";
?>
<p align="center" class="стиль1"><strong>Типовой договор № <?php echo $con_number['con_number_e']?> </strong></p>
    <table width="100%" border="0">
    </table>
    