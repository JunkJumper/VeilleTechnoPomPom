<?php

class RSSArticleManager {

    private $tabURL = array(
        "http://fetchrss.com/rss/623835ee6d0a996f7618ae846238378f6d0a996f7618ae87.xml",
        "http://fetchrss.com/rss/623835ee6d0a996f7618ae8462383827e86268469f11a067.xml",
        "http://fetchrss.com/rss/623835ee6d0a996f7618ae84623839cd96c8cc470d178c42.xml",
        "http://fetchrss.com/rss/623835ee6d0a996f7618ae8462383a1596930474967f6092.xml",
        "http://fetchrss.com/rss/623835ee6d0a996f7618ae8462383a9e3d886a00a16a2d32.xml"
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

    public function createNArticles(int $a) : array {
        $tabArticle = array();
        $rtabArticle = array();

        foreach ($this->tabURL as $u) {
            $rss = simplexml_load_file($u);
            foreach ($rss->channel->item as $item){
                $desc = "";
                array_push($tabArticle, new RSSArticle($item->title, date_create($item->pubDate), $item->link));
            }
        }

        for($i = 0; $i < $a; ++$i) {
            $rtabArticle[$i] = $tabArticle[$i];
        }

        return $rtabArticle;
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