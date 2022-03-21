<?php

include './RSSArticle.php';
include './RSSArticleManager.php';

$am = new RSSArticleManager();
$tabArticle = $am -> sortArticles($am -> createArticles());
$sideBarArticles = $am -> sortArticles($am -> createNArticles(5));

$text = file_get_contents("./synthese.txt");

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Veille Technologique Framework PHP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Roboto", sans-serif;
    }

    .w3-sidebar {
        z-index: 3;
        width: 250px;
        top: 43px;
        bottom: 0;
        height: inherit;
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a href="./index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Index</a>
        <a href="./article.php" class="w3-bar-item w3-button w3-theme-l1">Article</a>
        </div>
    </div>

    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()"
            class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
            <i class="fa fa-remove"></i>
        </a>
        <h4 class="w3-bar-item"><b>Derniers articles</b></h4>
        <?php
        foreach ($sideBarArticles as $a) {
            echo '<a class="w3-bar-item w3-button w3-hover-black" href="' .$a->getArticleUrl() .'" target="_blank">' .$a->getArticleName() .'</a>';
        }
        ?>
        <a class="w3-bar-item w3-button w3-hover-black" href="">Voir plus d'article</a>
    </nav>

    <!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
    <div class="w3-main" style="margin-left:250px">

        <div class="w3-row w3-padding-64">
            <div class="w3-twothird w3-container">
                <h1 class="w3-text-teal">Veille Technologique | Framework PHP</h1>
                <p><?php echo $text ?></p>
            </div>
        </div>

        <div class="w3-row">
            <div class="w3-twothird w3-container">
                <h1 class="w3-text-teal">Les <?php echo sizeof($tabArticle)?> derniers articles</h1>
            </div>
        </div>

        <?php
            foreach ($tabArticle as $a) {
                
                echo '<div class="w3-row">';
                    echo '<div class="w3-twothird w3-container">';
                        echo '<h3 class="w3-text-cyan">'. $a->getArticleName() .'</h3>';
                        echo '<p class="w3-text-grey">'.date_format($a->getArticleDate(), 'd M Y').'</p>';
                        echo '<a class="w3-text-blue-grey" href="'. $a->getArticleUrl() .'" target="_blank">'. $a->getArticleUrl() .'</a>';
                    echo '</div>';
                echo '</div>';
            }
        ?>

        <!-- END MAIN -->
    </div>
</body>

</html>