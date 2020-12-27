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

<?php include "../core/main_page/navbar.php"  ?>

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
            <td>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        Редактирование
                    </button>
                    <div class="dropdown-menu" style="width: 300px;">
                        <form class="px-1 py-3" action="../core/admin_back/update.php" method="post">
                            <div class="form-group">
                                <label for="fio">ФИО</label>
                                <input name="fio" value="<?= $row['fio_e']; ?>" type="text" class="form-control" id="fio"
                                       placeholder="Фамилия Имя Отчество">
                            </div>
                            <div class="form-group">
                                <label for="phone">Дата рождения</label>
                                <input name="birthday" value="<?= $row['birthday_e']; ?>" type="date" class="form-control" id="birthday">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input name="phone" value="<?= $row['phone']; ?>" type="text" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="position">Должность</label>
                                <input name="doljnost" value="<?= $row['doljnost']; ?>" type="text" class="form-control" id="position">
                            </div>
                            <div class="form-group">
                                <label for="course">Направление</label>
                                <input name="specialnost" value="<?= $row['specialnost']; ?>" type="text" class="form-control" id="course">
                            </div>
                            <div class="form-group">
                                <label for="education">Образование</label>
                                <input name="education" value="<?= $row['education']; ?>" type="text" class="form-control" id="education">
                            </div>
                            <div class="form-group">
                                <label for="experience">Опыт</label>
                                <input name="exp" value="<?= $row['exp']; ?>" type="text" class="form-control" id="experience">
                            </div>
                            <!--скрытое поле-->
                            <input type="hidden" name="id" value="1">
                            <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto;" name="update_worker" value="<?= $row['empl_nomer']; ?>">Применить</button>
                        </form>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>

            </td>
            <td>

                    <form action="contract.php" method="post"><button name="contract" value="<?= $row['empl_nomer']; ?>" class="btn btn-primary" role="button" aria-disabled="true">Договор</button></form>
            </td>
            <td>
                <?php 
                    $worker = $row['empl_nomer'];
                    $res = mysqli_query($link, "select con_number_e, create_date from contract_e where empl_nomer=$worker order by con_number_e desc");
                    $count = mysqli_num_rows($res);
                    if ($count>0){ 

                ?>
                <div class="dropdown dropleft">
                    <button type="button"  class="btn btn-info dropdown-toggle"  data-toggle="dropdown">
                        Архив сотрудника
                    </button>
                    <div class="dropdown-menu " style="height: 200px; overflow-y: scroll;">
                        <?php 
                            echo "<table>
                                    <tr>
                                        <th style='font-size:13px;' scope='col'>Номер договора</th>
                                        <th style='font-size:13px;' scope='col'>Дата заключения</th>
                                        <th style='font-size:13px;' scope='col'><p class='my-2'>Скачать</p></th>
                                    </tr>";
                            while ($count>0){
                                $dogovor = mysqli_fetch_assoc($res);  
                                $con_number_e = $dogovor['con_number_e'];
                                $create_date = $dogovor['create_date'];

                                echo "
                                
                                    <tr>
                                        <td style='font-size:14px;'><p class='mx-3 my-2'>$con_number_e</p></td>
                                        <td style='font-size:14px;'><p class='my-2'>$create_date</p></td>
                                        <td style='font-size:14px;'><form action='../core/admin_back/DOC_contract_e.php' method='post'><a href='../core/main_page/ООО_Интурбус_договор_сотрудника.doc' role='button' name='download' value='$con_number_e' class='btn btn-light' download >
                                        <input type='hidden' name='con_nomer' value='$con_number_e'>
                                        <img src='../assets/img/download.svg'></button></form></td>
                                    </tr>
                                ";
                                $count--;
                            }
                            echo "</table>";
                        ?>
                    </div>
                </div>
                <?php } ?>
            </td>
            <td><form method="post" action="../core/admin_back/delete.php" onsubmit="return confirm('Это действие необратимо. Вы уверены?')">
                <button name="delete_worker" value="<?= $row['empl_nomer']; ?>" type="submit" class="btn btn-danger">Удалить</button>
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
