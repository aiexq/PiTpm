<?php
session_start();
include '../core/db/connect.php';
$search = $_POST['search'];
$result = mysqli_query($link, "select * from abonement");
  ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Абонементы</title>

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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название абонемента</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Срок</th>
            <th scope="col"></th>
            <th scope="col"></th>
            
        </tr>
        </thead>
        <tbody>
        <?php 
            while($row = mysqli_fetch_array($result)){
        ?>   
        <tr>
            <td><?= $row['abon_number']; ?></td>
            <td><?= $row['abon_name']; ?></td>
            <td><?= $row['description']; ?></td>
            <td><?= $row['price']; ?></td>
            <td><?= $row['srok_abon']; ?></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Редактирование
                    </button>
                    <div class="dropdown-menu" style="width: 300px;">
                        <form class="px-1 py-3" action="../core/admin_back/update.php" method="post">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input name="name" value="<?= $row['abon_name']; ?>" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" class="form-control" id="description"><?= $row['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input name="price" value="<?= $row['price']; ?>" type="number" class="form-control" id="price">
                            </div>
                            <div class="form-group">
                                <label for="srok">Срок абонемента</label>
                                <input name="srok" value="<?= $row['srok_abon']; ?>" type="number" class="form-control" id="srok">
                            </div>
                            <!--скрытое поле-->
                            <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto;" name="update_abonement" value="<?= $row['abon_number']; ?>">Применить</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </td>
            <td><form method="post" action="../core/admin_back/delete.php" >
                <button name="delete_abonement" value="<?= $row['abon_number']; ?>" type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
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
