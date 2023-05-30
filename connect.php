<?php 
    session_start();
    $connect = mysqli_connect('localhost','root','','admin');
    if(!$connect) {
        die('Ошибка');
    }

    if (isset($_SESSION['admin'])) {
        $login = $_SESSION['admin'];
        $id = mysqli_query($connect, "SELECT id FROM admins WHERE login = '$login'");
    }
    else {
        $login = $_SESSION['user'];
        $id = mysqli_query($connect, "SELECT id FROM users WHERE login = '$login'");
    }
    
    $id = mysqli_fetch_all($id);
    $id = $id[0][0];
?>