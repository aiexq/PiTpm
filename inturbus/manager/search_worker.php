<?php
session_start();
include '../core/db/connect.php';
$search = $_POST['search'];
$result = mysqli_query($link, "select * from employee where fio_e like '%$search%' or empl_nomer like '%$search%'");
  ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Сотрудники</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="button.css" rel="stylesheet">

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
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>

<?php include "../core/main_page/navbar_manager.php"  ?>

<main role="main" class="mx-5">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">ФИО</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Телефон</th>
            <th scope="col">Должность</th>
            <th scope="col">Направление</th>
            <th scope="col">Образование</th>
            <th scope="col">Опыт</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php 
            while($row = mysqli_fetch_array($result)){
        ?>   
        <tr>
            <td ><?= $row['empl_nomer']; ?></td>
            <td><?= $row['fio_e']; ?></td>
            <td><?= $row['birthday_e']; ?></td>
            <td><?= $row['phone']; ?></td>
            <td><?= $row['doljnost']; ?></td>
            <td><?= $row['specialnost']; ?></td>
            <td><?= $row['education']; ?></td>
            <td><?= $row['exp']; ?></td>
        </tr>             
        <?php 
            } 
        ?>
        </tbody>
    </table>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
