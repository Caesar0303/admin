<?php 
    require_once "connect.php";
    $comment = $_POST['comment'];
    $currentDate = date('Y-m-d');
    var_dump($comment);
    var_dump($login);
    var_dump($currentDate);
    if (isset($comment) && isset($comment) && isset($comment)) {
        if (isset($_SESSION['user'])) {    
            mysqli_query($connect, "INSERT INTO comments (comment, user_id, admin, author, date) VALUE ('$comment', '$id', FALSE ,'$login','$currentDate')");
        } else {
            mysqli_query($connect, "INSERT INTO comments (comment, user_id, admin, author, date) VALUE ('$comment', '$id', TRUE ,'$login','$currentDate')");
        }
        header("location: index.php");
    }
?>