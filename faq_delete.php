<?php 
    require_once "connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($connect, "DELETE FROM faq WHERE id = $id");
        header("Location: index.php");
    }
?>