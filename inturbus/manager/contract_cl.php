<?php
session_start();
if(isset($_POST['contract_cl'])){
    $id_cl = $_POST['contract_cl'];

    include '../core/db/connect.php';
    $result = mysqli_query($link, "select * from client where id_cl=$id_cl");
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
    <title>Составление договора</title>

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

<?php include "../core/main_page/navbar_manager.php"  ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Составление договора с клиентом</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Личные данные</h4>
            <form class="needs-validation" novalidate action="#" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fio">ФИО</label>
                        <input name="fio" type="text" class="form-control" id="fio" placeholder="Петров Петр Петрович" value="<?= $row['fio_cl']; ?>" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Дата рождения</label>
                        <input name="birthday" class="form-control" type="date" value="<?= $row['birthday_cl']; ?>" id="birthday" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="phone">Номер телефона</label>
                        <input name="phone" type="number" class="form-control" id="phone" placeholder="Телефон" value="<?= $row['phone_cl']; ?>" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="serija">Серия паспорта</label>
                            <input name="serija" class="form-control" type="number" placeholder="Серия" id="serija" required>
                            <div class="invalid-feedback">
                                Поле обязательно к заполнению
                            </div>
                        </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomer">Номер паспорта</label>
                        <div class="input-group">
                            <input name="nomer" type="text" class="form-control" id="nomer" placeholder="Номер" required>
                            <div class="invalid-feedback">
                                Поле обязательно к заполнению
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kem_vidan">Кем выдан</label>
                        <input name="kem_vidan" type="text" class="form-control" id="kem_vidan" placeholder="Кем выдан" required>
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
                        <label for="adres">Адрес</label>
                        <input name="adres" type="text" class="form-control" id="adres" placeholder="Адрес" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="snils">Выберите абонемент</label>
                        <br>
                        <select class="col-md-6 mb-3 btn btn-light" name="abonement">
                            <option selected disabled>Абонементы</option>
                            <?php 
                            $abon_query = mysqli_query($link, "select * from abonement");
                            while($abons = mysqli_fetch_array($abon_query)){
                                $abon_name = $abons['abon_name'];
                                $abon_number = $abons['abon_number'];
                                echo "<option value='$abon_number'>$abon_name</option>";
                            }
                             ?>
                        </select>
                        <div class="invalid-feedback" >
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_cl" value="<?= $id_cl;?>">
                <hr class="mb-4">
                <?php include "../core/manager_back/addcontract_cl_back.php";  ?>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="addcontract_cl">Составить договор</button>
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
