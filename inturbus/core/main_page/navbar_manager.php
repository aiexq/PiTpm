<?php session_start(); ?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <h3><a href="../home.php"><span class="badge badge-primary "><?= $_SESSION['login_name']; ?></span></a></h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mr-5">
            <div class="dropdown show">
                <!--  -->
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenulin"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Клиенты
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item my-3 mx-1" href="../../manager/addclient.php">Добавить клиента</a>
                    <hr class="">
                    <!--  -->
                    <form class="dropdown-item form-inline my-2 my-lg-0" action="../../manager/search_client.php" method="post">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="ФИО/Номер" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск Клиентов</button>
                    </form>
                </div>
            </div>
            </li>   
            <li class="nav-item mr-5">
            <div class="dropdown show">
                <!--  -->
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenulin"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сотрудники
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <!--  -->
                    <form class="dropdown-item form-inline my-2 my-lg-0" action="../../manager/search_worker.php" method="post">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="ФИО/Номер" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск сотрудников</button>
                    </form>
                </div>
            </div>
            </li>          
            <li class="nav-item mr-5">
                <div class="dropdown show">
                    <!--  -->
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenulin"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Абонементы
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <!--  -->
                            <a href="../../manager/abonement.php" class="dropdown-item my-3 mx-1" type="submit">Список абонементов</a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <!-- exit.php -->
                <form method="post" action="../../core/main_page/exit.php">
                    <button type="submit" class="btn btn-danger">Выход</button>
                </form>
            </li>
        </ul>
    </div>
</nav>