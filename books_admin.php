<?php 
    require_once "head.php";
    require_once "connect.php";
    $books = mysqli_query($connect, "SELECT * FROM books");
    $books = mysqli_fetch_all($books);
?>
    <a href="index.php">Назад</a>
    <br>
    <div class="table_wrapper table-responsive">
        <table>
            <tbody class="table table-striped table-bordered table-hover">
                <tr>
                <th>
                    Номер
                </th>
                <th>
                    Название
                </th>
                <th>
                    Автор
                </th>
                <th>
                    Жанр
                </th>
                </tr>
                    <?php 
                        foreach ($books as $book) {
                    ?>
                <tr>
                    <td><?= $book[0] ?></td>
                    <td><?= $book[1] ?></td>
                    <td><?= $book[2] ?></td>
                    <td><?= $book[3] ?></td>
                    <td><?= '<a href="books_delete.php?id='.$book[0].'">Удалить</a>' ?></td>
                    <td><?= '<a href="?update=true&id='.$book[0].'"> Изменить </a>' ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php             
        $id = $_GET['id'];
        if ($_GET['update'] == true) {
            $books_values = mysqli_query($connect, "SELECT * FROM books WHERE id = $id");
            $books_values = mysqli_fetch_all($books_values);
            foreach ($books_values as $books_value) {
    ?> 
        <form action="books_update.php" method="get">
            <input type="text" placeholder="Название" name="name" value="<?= $books_value[1] ?>" >
            <input type="text" placeholder="Автор" name="author" value="<?= $books_value[3] ?>">
            <input type="text" placeholder="Жанр" name="genre" value="<?= $books_value[2] ?>">
            <input type="hidden" placeholder="Жанр" name="id" value="<?= $books_value[0] ?>">
            <button>Сохранить</button>
            <a href="?">Закрыть </a>
        </form>
    <?php
        }
    }
    ?>               
    <div class="form_wrapper">
        <form action="books_add.php" method="get">
            <input type="text" placeholder="Название" name="name">
            <input type="text" placeholder="Автор" name="author">
            <input type="text" placeholder="Жанр" name="genre">
            <button>Добавить</button>
        </form>
    </div>
<?php require_once "foot.php";?>