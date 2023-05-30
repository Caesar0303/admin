<?php 
    require_once "connect.php";
    var_dump($_POST['id']);
    var_dump($_POST['answer']);
    var_dump($_POST['question']);
    if(isset($_POST['id'])) {
        $answer = $_POST['answer'];
        $question = $_POST['question'];
        $id = $_POST['id'];
        mysqli_query($connect, "UPDATE faq SET questions = '$question', answers = '$answer' WHERE id = $id");
        header("Location: index.php");
    }
?>