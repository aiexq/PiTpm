<?php //Подключение к БД
    $link = mysqli_connect('localhost', 'root', 'sushka34', 'inturbus'); //('localhost', 'имя пользователя', 'пароль', 'имя БД'); 
    
    // вывод ошибки соединения
    if (!$link) {echo "<script>document.write('Ошибка подключения к серверу: ');</script>". mysqli_connect_error();
        exit;
    };
?>