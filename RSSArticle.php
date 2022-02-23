<?php

class RSSArticle {
    private String $nom;
    private DateTime $date;
    private String $url;
    
    public function __construct(String $n, DateTime $d, String $u) {    
        $this -> nom = $n;
        $this -> date = $d;
        $this -> url = $u;
    }

    public function getArticleName() : String {
        return $this -> nom;
    }

    public function getArticleDate() : DateTime {
        return $this -> date;
    }

    public function getArticleUrl() : String {
        return $this -> url;
    }

    public function __toString()
    {
        return '<ul><li>' .$this->getArticleName() . '</li><li>' .date_format($this->getArticleDate(), 'd M Y') . '</li><li>' .$this->getArticleUrl() .'</ul>';
    }
}