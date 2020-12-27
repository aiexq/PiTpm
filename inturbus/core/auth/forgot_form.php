<?php 
session_start();
?>
<!DOCTYPE HTML5>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <link rel="shortcut icon" href="assets/img/gym_icon.png">
  <title>Восстановление пароля</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
  <link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link href="../../assets/css/floating-labels.css" rel="stylesheet">
</head>
<body>
  <form class="form-signin" action="#" method="post">
    <div class="text-center mb-4">
      <!-- <img class="mb-4" src="../assets/img/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Восстановление</h1>
      <p>Введите Email, который вы указали в профиле</p>
    </div>

    <div class="form-label-group">
      <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
      <label for="inputEmail">Email</label>
      <?php include "sendmail.php" ?>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Восстановить</button>
    <button class="btn btn-lg btn-secondary btn-block" type="button" onclick="window.location='../../auth.php'">Вернуться</button>
    <footer><p class="mt-5 mb-3 text-muted text-center" style="font-size: 14px">&copy; 2020, ООО "Интурбус"<br>All rights reserved<br>Спорткомплекс «Екатерининский»<br>Екатерининский проспект д. 3 к. 2<br><a>help@inturbus.ru</a></b></p></footer>
  </form>
</body>
</html>