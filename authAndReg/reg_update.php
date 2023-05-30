<?php
    require_once('../connect.php');
    
    $login = $_POST['rlogin'];
    $password = $_POST['rpassword'];
    $email = $_POST['remail'];
    if (empty($login) || empty($password)) {
        echo "Заполните поля";
    } else {
        $sql = "INSERT INTO `users` (login,password) VALUES ('$login','$password')";
        if ($connect -> query($sql) === TRUE) {
            echo 'Успех!';
            $_SESSION['success'] = true;
        } else {
            $_SESSION['error'] = true;
            echo 'Ошибка ' . $connect -> error;
        }
    }

?>
