<?php
session_start();
include '../core/db/connect.php';
if(isset($_POST['uchet'])){
$empl_nomer = $_POST['empl_nomer'];
$result = mysqli_query($link, "select * from employee where empl_nomer=$empl_nomer");
$row = mysqli_fetch_assoc($result);
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
}
  ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Поиск сотрудников</title>

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

<?php include "../core/main_page/navbar.php"  ?>

<main role="main" class="mx-5">
<h3 class="text-center my-3"><?= $row['fio_e'] ?></h2>
    <table class="container table">
        <thead>
        <tr>
            <th scope="col">Количество привлеченных клиентов</th>
            <th scope="col">Общая сумма с абонементов клиентов</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <?php 
                $result = mysqli_query($link, "select count(*) as count from contract_cl where id_m=$empl_nomer and (create_date_cl between '$start_date' and '$end_date')");
                $row = mysqli_fetch_assoc($result);
                echo $row['count']; 
                ?>                        
                </td>
                <td>
                    <?php 
                $result = mysqli_query($link, "select sum(price) as sum from contract_cl where id_m=$empl_nomer and (create_date_cl between '$start_date' and '$end_date')");
                $row = mysqli_fetch_assoc($result);
                echo $row['sum']; 
                ?>    
                </td>
            </tr>
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
