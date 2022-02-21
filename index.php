<?php

include './Article.php';

$url = "http://fetchrss.com/rss/6213baca199e171a5d6eacc26213babd69097e19dd230f73.xml"; /* insérer ici l'adresse du flux RSS de votre choix */
$rss = simplexml_load_file($url);

$tabArticle = array();
foreach ($rss->channel->item as $item){

    $desc = explode("</div>", explode('<div class="content">', $item->description)[1]);

    array_push($tabArticle, new Article($item->title, $desc[0], date_create($item->pubDate), $item->link));
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Veille Technologique Framework PHP</title>
        <link rel="stylesheet" href="./css/bootstrap.css" />
    </head>
    <body>
        <div class="title">
            <p>Veille Technologique | Framework PHP</p>
        </div>

        <?php
        
        foreach ($tabArticle as $a) {
            echo $a.'<br />';
        }
        
        ?>
    

    </body>
    <script src="./js/bootstrap.js"></script>
</html>