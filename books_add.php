<?php 
    require_once "connect.php";
    if (isset($_GET['name']) || isset($_GET['genre']) || isset($_GET['author'])) {
        $name = $_GET['name'];
        $genre = $_GET['genre'];
        $author = $_GET['author'];
        mysqli_query($connect, "INSERT INTO books (name, genre, author) VALUES ('$name', '$genre', '$author');
        ");
        header("Location: books_admin.php");
    }
?>