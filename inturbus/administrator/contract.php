<?php
session_start();
if (isset($_POST['contract'])){
    $_SESSION['empl_nomer'] = $_POST['contract'];
    $empl_nomer = $_POST['contract'];
    include '../core/db/connect.php';
    $result = mysqli_query($link, "select * from employee where empl_nomer=$empl_nomer");
    $row = mysqli_fetch_assoc($result);
}
  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Составление договора с сотрудником</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">

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
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "../core/main_page/navbar.php"  ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../js/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Составление договора</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Личные данные</h4>
            <form class="needs-validation" novalidate action="#" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fio">ФИО</label>
                        <input name="fio" type="text" class="form-control" id="fio" placeholder="Петров Петр Петрович" value="<?= $row['fio_e']; ?>" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Дата рождения</label>
                        <input name="birthday" class="form-control" type="date" value="<?= $row['birthday_e']; ?>" id="birthday" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="seria">Серия</label>
                        <input name="serija" type="number" class="form-control" id="seria" placeholder="Серия паспорта" value="" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomer">Номер</label>
                        <input name="nomer" class="form-control" type="number" placeholder="Номер паспорта" id="nomer" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="whoget">Кем выдан</label>
                    <div class="input-group">
                        <input name="kem_vidan" type="text" class="form-control" id="whoget" placeholder="Кем выдан паспорт" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address">Адрес регистрации</label>
                        <input name="adres" type="text" class="form-control" id="address" placeholder="Адрес" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date-get">Дата выдачи</label>
                        <input name="data_pasp" class="form-control" type="date" value="" id="date-get" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inn">ИНН</label>
                        <input name="inn" type="number" class="form-control" id="inn" placeholder="ИНН" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="snils">CНИЛС</label>
                        <input name="snils" class="form-control" type="number" placeholder="СНИЛС" value="" id="snils" required>
                        <div class="invalid-feedback" pattern="[\d]{3}\-){3}\d{2}">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <!-- <h3 class="mb-3">Проф-навыки</h3> -->
                <div class="mb-3">
                    <label for="co-worker">Должность</label>
                    <input name="doljnost" value="<?= $row['doljnost']; ?>" type="text" class="form-control" id="co-worker" placeholder="Должность" required="">
                    <div class="invalid-feedback">
                        Поле обязательно к заполнению
                    </div>
                </div>
                <div class="mb-3">
                    <label for="oklad">Оклад</label>
                    <input name="oklad" type="number" class="form-control" id="oklad" placeholder="Оклад" required="">
                    <div class="invalid-feedback">
                        Поле обязательно к заполнению
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start-work">Начало работы</label>
                        <input name="start_work" type="date" class="form-control" id="start-work" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start-work-contract">Дата вступления контракта в силу</label>
                        <input name="start_work_contract" class="form-control" type="date" id="start-work-contract" required="">
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <?php include "../core/admin_back/addcontract_back.php";  ?>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="addcontract">Составить договор</button>
            </form>
        </div>
    </div>

    <?php include "../core/main_page/footer.php"; ?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="form-validation.js"></script>
</body>
</html>
