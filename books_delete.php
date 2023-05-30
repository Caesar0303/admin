<?php 
    require_once "connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($connect, "DELETE FROM books WHERE id = $id");
        header("Location: books_admin.php");
    }
?>