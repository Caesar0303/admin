<?php 
    require_once "connect.php";
    var_dump($_POST['faq_question']);
    var_dump($_POST['faq_answer']);
    $faq_question = $_POST['faq_question'];
    $faq_answer = $_POST['faq_answer'];
    if(isset($faq_answer) && isset($faq_question)) {
        mysqli_query($connect, "INSERT INTO faq (questions, answers) VALUES ('$faq_question','$faq_answer')");
        header("Location: index.php");
    }
?>