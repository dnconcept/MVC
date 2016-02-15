<?php

namespace App\Controller;

use PDO;
use App\Model\Article;

Class ArticleController
{

    const VIEW_DIRECTORY = "./views";

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=imie", "root", "", [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
    }

    public function homeAction()
    {
        $this->renderView("home", [
        ]);
    }

    public function showPosts()
    {
        $sth = $this->pdo->query("SELECT * from posts", PDO::FETCH_CLASS, Article::class);
        $posts = $sth->fetchAll();
        $this->renderView("list-articles", [
            "posts" => $posts
        ]);
    }

    public function showPostById($id)
    {
        $sth = $this->pdo->prepare("SELECT * from posts WHERE id = ?");
        $sth->execute([$id]);
        $post = $sth->fetchObject(Article::class);
        $this->renderView("detail-article", [
            "post" => $post
        ]);

    }

    private function renderView($view, $data = [])
    {
        extract($data);
        ob_start();
        require_once "./views/$view.phtml";
        $content = ob_get_clean();
        require_once "./views/layout.phtml";
    }

}