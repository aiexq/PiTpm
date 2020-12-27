<?php
if(isset($_POST['email'])){
	include "../db/connect.php";
	$email = $_POST['email'];
	$result = mysqli_query($link,"select login_m, password_m from manager where email='".$email."'");
	$row = mysqli_fetch_assoc($result);
	if(!empty($row['login_m'])){//manager
		$login = $row['login_m'];
		$password = $row['password_m'];
		$to = $email;
		$subject = "Интурбус - Данные учетной записи";
		$message = "<b> Для входа в систему используйте следующие данные: <br>Логин: $login<br>Пароль: $password</b>";
		$header = "From: <inturbus@help.com> \r\n";
		$header .= "Content-type: text/html; \r\n";
		$retval = mail($to,$subject,$message,$header);
		if( $retval == true ) {
			echo "<p style='color:green; font-size: 13px;'>На указанный Email отправлено письмо с данными аккаунта</p>";
		} else {
			echo "<p style='color:red; font-size: 13px;' >Ошибка: Свяжитесь с разработчиком</p>";
		}
	} else if($email=="replaykazadon@gmail.com"){//admin
			$to = "replaykazadon@gmail.com";
			$subject = "Интурбус - Данные учетной записи";
			$message = "<b> Для входа в систему используйте следующие данные: <br>Логин: inturbus<br>Пароль: sushka34</b>";
			$header = "From: <help@inturbus.ru> \r\n";
			$header .= "Content-type: text/html; \r\n";
			$retval = mail($to,$subject,$message,$header);
			if( $retval == true ) {
				echo "<p style='color:green; font-size: 13px;'>На корпоративный Email отправлены данные аккаунта администратора</p>";
			} else {
				echo "<p style='color:red; font-size: 13px;'>Ошибка: Свяжитесь с разработчиком</p>";
			}
	} else {
		echo "<p style='color:red; font-size: 13px;'> Email неверный</p>";
	}
}
?>