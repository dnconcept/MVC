<?php

$root = "/IMIE/MVC/";

$url = parse_url($_SERVER["REQUEST_URI"]);

$url_params = str_replace($root, "", $url);

$action = $url_params["path"];

require_once "vendor/autoload.php";

$controller = new App\Controller\ArticleController();

if ($action == "home"){
    $controller->homeAction();
}
elseif ($action == "post-list"){
    $controller->showPosts();
} elseif ($action == "post-detail" && isset($_GET["id"])){
    $id = (int) $_GET["id"];
    $controller->showPostById($id);
} else {
    echo "NOT FOUND";
}



