<?php
//Models

require_once "models/Article.php";

require_once "controllers/articleController.php";

$controller = new ArticleController();
$posts = $controller->getPosts();

require_once "views/list-articles.phtml";
