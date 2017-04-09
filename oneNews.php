<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
</head>
<body>
<?php
require_once('news.php');
$id = $_GET['id'];

$oneNews = new OneNews();
$oneNews->printOneNews($id);



?>
<form action="" method="POST">
    <strong>
        Оставьте отзыв
    </strong>

    <div class="form-group">
        <label>Введите текст</label><br>
        <textarea name="feedback"
                  style="min-width: 50%; max-width: 50%; min-height: 100px; max-height: 300px; padding: 15px; margin-bottom: 15px"
                  required></textarea>
    </div>

    <input type="submit" name="submit" value="Отправить">
</form>
<a href="allNews.php">Назад</a>;
</body>
</html>

