<?php

class RSSArticleManager {

    private $tabURL = array(
        "http://fetchrss.com/rss/6213baca199e171a5d6eacc26213babd69097e19dd230f73.xml",
        "http://fetchrss.com/rss/6213baca199e171a5d6eacc26214b2ca9bb3286594306764.xml",
        "http://fetchrss.com/rss/6213baca199e171a5d6eacc26214b5c20a15a160ea326d82.xml",
        "http://fetchrss.com/rss/6213baca199e171a5d6eacc26214b6fd3f6eb80141637472.xml",
        "http://fetchrss.com/rss/6213baca199e171a5d6eacc26214b7ac82763a37db6639c4.xml"
    );

    public function __construct() {
    }

    public function createArticles() : array {
        $tabArticle = array();

        foreach ($this->tabURL as $u) {
            $rss = simplexml_load_file($u);
            foreach ($rss->channel->item as $item){
                $desc = "";
                array_push($tabArticle, new RSSArticle($item->title, date_create($item->pubDate), $item->link));
            }
        }
        return $tabArticle;
    }

    public function sortArticles(array $a) : array {
        $tab = $a;
        usort($tab, function($firstArticle, $secondArticle) { //sorting method of all articles
            $testA = $firstArticle->getArticleDate();
            $testB = $secondArticle->getArticleDate();
            if ($testA == $testB) {
                return 0;
            }
            return $testA > $testB ? -1 : 1;
        });

        return $tab;
    }

}