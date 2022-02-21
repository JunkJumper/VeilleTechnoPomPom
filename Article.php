<?php

class Article {
    private String $nom;
    private String $desc;
    private DateTime $date;
    private String $url;
    
    public function __construct(String $n, String $de, DateTime $da, String $u) {    
        $this -> nom = $n;
        $this -> desc = $de;
        $this -> date = $da;
        $this -> url = $u;
    }

    public function getArticleName() {
        return $this -> nom;
    }

    public function getArticleDescription() {
        return $this -> desc;
    }

    public function getArticleDate() {
        return $this -> date;
    }

    public function getArticleUrl() {
        return $this -> url;
    }

    public function __toString()
    {
        return '<ul><li>' .$this->getArticleName() . '</li><li>' .$this->getArticleDescription() . '</li><li>' .date_format($this->getArticleDate(), 'd M Y, H\hi') . '</li><li>' .$this->getArticleUrl() .'</ul>';
    }
}