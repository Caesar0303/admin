<?php 
    require_once('../connect.php');
    session_start();
    $login = $_POST['alogin'];
    $password = $_POST['apassword'];
    
    if (empty($login) || empty($password)) {
        echo 'Заполните все поля';
    } else {
        $sql = "SELECT * FROM `admins` WHERE login = '$login' AND password = '$password'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $_SESSION['admin'] =  $login;
                $_SESSION['user'] =  NULL;
                header('Location: ../index.php');
                $text = "Вы зашли как админ";
            }
        } else {
            $sql = "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'";
            $result = $connect->query($sql);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['user'] =  $login;
                    $_SESSION['admin'] =  NULL;
                    header('Location: ../index.php');
                    $text = "Вы зашли как пользователь";
                }
            } else {
                $text = "Нету такого пользователя";
            }
        }
    }
    $_SESSION['text'] = $text;
?>