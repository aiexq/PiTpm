<?php 
session_start();
if(isset($_POST['delete_worker'])){
	include "../db/connect.php";
	$empl_nomer = $_POST['delete_worker'];
	$result = mysqli_query($link,"delete from employee where empl_nomer=$empl_nomer");
	$result = mysqli_query($link,"delete from contract_e where empl_nomer=$empl_nomer");
	header("Location: ../../administrator/search_worker.php");
	unset($_POST['delete']);
}
if(isset($_POST['delete_abonement'])){
	include "../db/connect.php";
	$abon_number = $_POST['delete_abonement'];
	$result = mysqli_query($link,"delete from abonement where abon_number=$abon_number");
	header("Location: ../../administrator/abonement.php");
	unset($_POST['delete']);
}
if(isset($_POST['delete_client'])){
	include "../db/connect.php";
	$id_cl = $_POST['delete_client'];
	$result = mysqli_query($link,"delete from client where id_cl=$id_cl");
	header("Location: ../../administrator/abonement.php");
	unset($_POST['delete']);
}
?>