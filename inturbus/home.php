<?php
    session_start();
    if ($_SESSION['auth']!=1) {
        header("Location: auth.php");
    } else if ($_SESSION['user_type']=='admin'){
        $_SESSION['user'] = 'Admin';
    }   else if ($_SESSION['user_type']=='manager'){
        $_SESSION['user'] = 'Manager1';
    }
  ?>
<!DOCTYPE HTML>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Главная страница</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

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
    <!-- Custom styles for this template -->
    <link href="administrator/starter-template.css" rel="stylesheet">
</head>
<body>
<?php 
if ($_SESSION['user']=='Admin'){
    include "core/main_page/navbar.php";
} else {
    $id_manager = $_SESSION['login'];
    include "core/db/connect.php";
    $result = mysqli_query($link, "select fio_e from employee where empl_nomer=$id_manager");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login_name'] = $row['fio_e'];
    include "core/main_page/navbar_manager.php";
}
?>


<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1>ВНИМАНИЕ</h1>
            Уважаемые сотрудники, <strong><b>24 июня 2020-го года у нас выходной день.</b></strong> Желаем удачного отдыха! И не забудьте, что 25-го рабочий день!
            </p>
        </div>
    </div>
</main>
<?php include "core/main_page/footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
