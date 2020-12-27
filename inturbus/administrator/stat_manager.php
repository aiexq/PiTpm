<?php
session_start();
include '../core/db/connect.php';
$search = $_POST['search'];
$result = mysqli_query($link, "select * from employee where doljnost='Менеджер'");
$result1 = mysqli_query($link, "select * from employee where empl_nomer not in (select empl_nomer from manager) and doljnost='Менеджер'");
  ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Менеджеры</title>

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
            <th scope="col">ФИО</th>
            <th scope="col">Номер телефона</th>
            <th scope="col"></th>


        </tr>
        </thead>
        <tbody>
        <?php 
            while($row = mysqli_fetch_array($result)){
                $temp = $row['empl_nomer'];
                $res2 = mysqli_query($link, "select * from employee where empl_nomer=$temp");
                $res2_row = mysqli_fetch_assoc($res2);
                $result1 = mysqli_query($link, "select * from employee where empl_nomer not in (select empl_nomer from manager) and doljnost='Менеджер' and empl_nomer=$temp");
                $row1 = mysqli_fetch_assoc($result1);
                
        
                
        ?>   
            <tr>
                <td><?= $row['empl_nomer']; ?></td>
                <td><?= $res2_row['fio_e']; ?></td>
                <td><?= $res2_row['phone'] ?></td>
                <?php
                if(!($row1['empl_nomer']==$row['empl_nomer'])){
                  ?>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" name="uchet" value="<?= $res2_row['empl_nomer'] ?>" type="submit" data-toggle="dropdown">Статистика менеджера</button>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3" action="uchet_manager.php" method="post">
                                <p class="text-center"><b>Введите интервал между датами для учета статистики менеджера</b></p>
                            <div class="form-group">
                                <label for="start_date">Начальная дата</label>
                                <input name="start_date" type="date" class="form-control" id="start_date"
                                       placeholder="Логин" required="">
                            </div>
                            <div class="form-group">
                                <label for="end_date">Конечная дата</label>
                                <input name="end_date" type="date" class="form-control" id="end_date"
                                       placeholder="Пароль" required="">
                            </div>
                            <!--скрытое поле-->
                            <input type="hidden" name="empl_nomer" value="<?= $row['empl_nomer'] ?>">
                            <button type="submit" class="btn btn-primary" name="uchet">Применить</button>
                        </form>
                        </div>
                    </div>
                </td>
                <?php } ?>
                <td>
                    <?php 
                        if($row1['empl_nomer']==$row['empl_nomer']){

                      ?>
                    
                    <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Менеджеру нужен аккаунт!
                    </button>
                    <div class="dropdown-menu">
                        <form class="px-4 py-3" action="../core/admin_back/manager_account.php " method="post">
                            <div class="form-group">
                                <label for="loginform">Логин</label>
                                <input name="login" type="text" class="form-control" id="loginform"
                                       placeholder="Логин" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input name="password" type="text" class="form-control" id="password"
                                       placeholder="Пароль" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email-адрес</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       placeholder="Email" required>
                            </div>
                            <!--скрытое поле-->
                            <input type="hidden" name="empl_nomer" value="<?= $row['empl_nomer'] ?>">
                            <button type="submit" class="btn btn-primary" name="create">Создать</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
                </td>
            <?php } ?>
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
