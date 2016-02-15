<?php


Class ArticleController {

    public function getPosts(){
        $pdo = new PDO("mysql:host=localhost;dbname=imie", "root", "", [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
        $sth = $pdo->query("SELECT * from posts", PDO::FETCH_CLASS, "Article");
        return $sth->fetchAll();
    }

}