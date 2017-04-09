<?php

header("Content-Type: text/html; charset=utf-8");

abstract class News
{

    protected $id;
    protected $news;
    protected $newsText;
    protected $file;

    public function __construct()
    {
        $this->file = $file = json_decode(file_get_contents(__DIR__ . '/news.json'), true);
        return $this->file;
    }

}

interface GetAllNews
{
    public function printNews();

}

interface PrintOneNews
{
    public function printOneNews($id);
}

interface PrintComments
{
    public function printComments($id);
}

interface SetComments
{
    public function setComments($id);
}

class AllNews extends News implements GetAllNews
{
    public function printNews()
    {

        foreach ($this->file as $id => $newsData) {
            $this->id = $id;
            echo $this->news = '<h2><a href=oneNews.php?id=' . $id . '>' . $newsData['title'] . '</a></h2><br>';
            echo $this->newsText = '<p style="max-width: 300px">' . $newsData['text'] . '</p><br>';
        }
    }
}

class OneNews extends News implements PrintOneNews
{
    public function printOneNews($id)
    {
        echo '<h2>' . $this->file[$id]['title'] . '</h2><br>';
        echo '<p style="max-width: 700px">' . $this->file[$id]['text'] . '</p><br>';
        echo '<h4>Комментарии</h4>';

        $this->getComments($id);
    }

    public function getComments($id)
    {
        $comments = new Comments();
        $comments->printComments($id);
        $comments->setComments($id);
    }
}

class Comments extends News implements SetComments, PrintComments
{
    public function setComments($id)
    {

        if (isset($_POST['submit']) && $_POST['feedback'] != '') {

            $text = $_POST['feedback'];

            array_push($this->file[$id]['comments'], $text);

            file_put_contents(__DIR__ . '/news.json', json_encode($this->file, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            echo '<div>Ваше сообщение отправлено</div>';
        }
    }

    public function printComments($id)
    {
        foreach ($this->file[$id]['comments'] as $comment) {
            echo '<div style="padding: 15px; background: #EEE">' . $comment . '</div><br>';
        }
    }
}






