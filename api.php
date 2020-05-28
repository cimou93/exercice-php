<?php
$articles = file_get_contents("news.json");
$articles = json_decode($articles, true);

//recuperer la page
$page = $_GET['page'];

$debut =$page*5;
$fin =($page+1)*5;

for ($i = $debut; $i < $fin; $i++) {
    //modifier l'affichage de la date
    $articles['results'][$i]['publication_date_news'] = date('d/m/y', strtotime($articles['results'][$i]['publication_date_news']));

    $result['results'][] = $articles['results'][$i];
}

//ajouter les information de pagination
$result['pagination'] = $articles['pagination'];

echo json_encode($result);
