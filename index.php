<?php require_once "head.php"; ?>
    <?php 
        require_once 'connect.php';
        session_start();
        if ($_SESSION['admin'] == NULL && $_SESSION['user'] == NULL) {
            header('location: authAndReg/auth.php');
        }
        echo $_SESSION['text'];
        $books = mysqli_query($connect, "SELECT * FROM books");
        $books = mysqli_fetch_all($books);
    ?>
    <?php
        if (isset($_SESSION['admin'])) {
    ?>  
        <br>
        <a href="books_admin.php">Книги</a>
    <?php 
        }
    ?>
    <a href="authAndReg/auth.php">Выйти</a>
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
                </tr>
                <?php 
                        }
                ?>
            </tbody>
        </table>
    </div>
        <p> Комментарий </p>
        <div class="comments_wrapper">
            <form action="comments.php" method="POST" id="comments_input">
                <input type="text" placeholder="Напишите комментарий" name="comment">
            </form>
            <?php 
                $comments = mysqli_query($connect, "SELECT * FROM comments");
                $comments = mysqli_fetch_all($comments);
                foreach ($comments as $comment) {
                    echo '<div class="comments">';
                    echo '<div class="headers">';
                    if ($comment[2] == TRUE) {
                        echo "Админ '";
                    } else {
                        echo "Пользователь '";
                    }
                    echo $comment[4] . "' в " . $comment[5] . " ";
                    echo '<div class="buttons">';
                    if ($id == $comment[1] && $comment[2] == 0) {
                        echo "<a href='comments_delete.php?id=$comment[0]'>Удалить</a> ";
                        echo "<a href='?update_comments=true&id=$comment[0]''>Изменить</a>";
                    } else if (isset($_SESSION['admin'])) {
                        echo "<a href='comments_delete.php?id=$comment[0]''>Удалить</a> ";
                        echo "<a href='?update_comments=true&id=$comment[0]''>Изменить</a>";
                    }
                    echo '</div>';
                    echo '</div>'; // Закрытие div с классом "comments_headers"
                    echo '<div class="comment">';
                    echo $comment[3];
                    echo '</div>';
                    echo '</div>'; // Закрытие div с классом "comments_header"
                }
            ?>

            <?php
                $id = $_GET['id'];
                if ($_GET['update_comments'] == true) {
                    $comments_values = mysqli_query($connect, "SELECT * FROM comments WHERE id = $id");
                    $comments_values = mysqli_fetch_all($comments_values);
                    foreach ($comments_values as $comments_value) {
            ?> 
                <form action="comments_update.php" method="POST">
                    <input type="text" placeholder="Название" name="comment" value="<?= $comments_value[3] ?>" >
                    <input type="hidden" name="id" value="<?= $comments_value[0] ?>">
                    <button>Сохранить</button>
                    <a href="?">Закрыть </a>
                </form>
            <?php
                    }
                }
            ?>
    </div>
    <p>FAQ</p>
    <?php 
        if(isset($_SESSION['admin'])) {
    ?>
        <form action="faq_add.php" method="POST">
            <input type="text" name="faq_question" placeholder="Добавьте вопрос" required>
            <input type="text" name="faq_answer" placeholder="Добавьте ответ" required>
            <button>Сохранить</button>
        </form>
    <?php
        }
    ?>
    <?php
    $faqs = mysqli_query($connect, "SELECT * FROM faq");
    $faqs = mysqli_fetch_all($faqs);
    foreach($faqs as $faq) {
    ?>
        <div class="faq">
        <div class="headers">
            <div class="question">
              <?php echo '-' . $faq[1]; ?>
            </div>
            <?php
                if(isset($_SESSION['admin'])) {
            ?>
            <div class="buttons">
              <a href="faq_delete.php?id=<?php echo $faq[0]; ?>">Удалить</a>
              <a href="?update_faq=true&id=<?php echo $faq[0]; ?>">Изменить</a>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="answer">
          <?php echo '• '.$faq[2]; ?>
        </div>
      </div>
    <?php
    }
    ?>
    <?php
        $id = $_GET['id'];
        if ($_GET['update_faq'] == true) {
            $faq_values = mysqli_query($connect, "SELECT * FROM faq WHERE id = $id");
            $faq_values = mysqli_fetch_all($faq_values);
            foreach ($faq_values as $faq_value) {
    ?> 
        <form action="comments_update.php" method="POST">
            <p><textarea rows="10" cols="45" name="answer"><?= $faq_value[1] ?></textarea></p>
            <p><textarea rows="10" cols="45" name="question"><?=$faq_value[2]?></textarea></p>
            <input type="hidden" name="id" value="<?= $faq_value[0] ?>">
            <button>Сохранить</button>
            <a href="?">Закрыть </a>
        </form>
    <?php
            }
        }
    ?>
<?php require_once "foot.php"; ?>