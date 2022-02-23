<?php

include './RSSArticle.php';
include './RSSArticleManager.php';

$am = new RSSArticleManager();
$tabArticle = $am -> createArticles();
$tabArticle = $am -> sortArticles($tabArticle);

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
        echo sizeof($tabArticle) .' articles<br /><br />';
        foreach ($tabArticle as $a) {
            echo $a.'<br />';
        }
        
        ?>
    

    </body>
    <script src="./js/bootstrap.js"></script>
</html>