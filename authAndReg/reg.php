<?php require_once '../head.php'; ?>
    <div class="forms_wrapper">
        <form action="reg_update.php" method="POST" id="registration_form" class="forms container mt-4">
            <h2>Регистрация</h2> 
            <br>
            <input type="text" name="rlogin" placeholder="Введите логин" id="rLogin" class="form-control" required>
            <br>
            <input type="password" name="rpassword" placeholder="Введите пароль" id="rPassword" class="form-control" required>
            <br>
            <button class="btn btn-success">Зарегистрироваться</button>
        </form>
        Уже есть аккаунт?
        <a href="auth.php">Авторизация</a>
    </div>  
<?php require_once '../foot.php'; ?>
