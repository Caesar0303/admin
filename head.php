<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    p {
        margin-top: 15px;
        font-size: 18px;
        color: green;
    }
    .faq {
        background:#fff;
    }
    .answer {
        margin-left: 12px;
    }
    .form_wrapper {
        position: fixed;
        bottom: 0;
        border-radius: 3px;
        display: flex;
        justify-content: center; /* Горизонтальное центрирование */
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 20px;
    }

    .table_wrapper {
        display: flex;
        justify-content: center;
        flex-direction: column-reverse;
    }

    #comments_input {
        margin-bottom: 15px;
    }

    h1 {
        display: flex; 
        justify-content: center;
    }
    body{
        background:#F0F8FF;
    }
    .forms_wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .headers {
        background: #fff;
        display: flex;
        justify-content: space-between;
    }
    .comment {
        background: #fff;
        margin-bottom:10px;
    }
</style>
<body>
    <h1>Admin Panel</h1>