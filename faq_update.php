<?php
    require_once "connect.php";
    var_dump($_GET['name']);
    var_dump($_GET['author']);
    var_dump($_GET['genre']);
    
    if(isset($_GET['name']) && isset($_GET['author']) && isset($_GET['genre'])) {
        var_dump($_GET['id']);
        $name = $_GET['name'];
        $author = $_GET['author'];
        $genre = $_GET['genre'];
        $id = $_GET['id'];
        mysqli_query($connect, "UPDATE books SET name = '$name', author = '$author', genre = '$genre' WHERE id = $id");
        header("Location: books_admin.php");
    }
?>