<?php require_once '../head.php'; ?>
    <div class="forms_wrapper">
        <form action="auth_update.php" method="POST" id="authorization_form" class="forms container mt-4">
            <h2>Авторизация</h2>
            <br>
            <input type="text" name="alogin" placeholder="Введите логин" id="alogin" class="form-control" required> 
            <br>
            <input type="password" name="apassword" placeholder="Введите пароль" id="apassword" class="form-control" required>
            <br>
            <button class="btn btn-success">Войти</button>
        </form>
        Нету аккаунта?
        <a href="reg.php">Зарегистрироваться</a>
    </div>  
<?php require_once '../foot.php'; ?>