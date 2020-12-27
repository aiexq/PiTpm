<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Новый абонемент</title>

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
        <h2>Создание нового абонемента</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="#" method="post" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Название абонемента</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Название" value="" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control" placeholder="Описание" id="description" required></textarea>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price">Цена</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="В рублях" value="" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="srok">Срок</label>
                        <input name="srok" class="form-control" type="text" placeholder="Месяцев" value="" id="srok" required>
                        <div class="invalid-feedback">
                            Поле обязательно к заполнению
                        </div>
                    </div>
                </div>
                
                <hr class="mb-4">
                <?php include "../core/admin_back/addabonement_back.php";  ?>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="addabonement">Создать</button>
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
