<?php

class Article {
    private String $nom;
    private String $desc;
    private DateTime $date;

    public function __construct(String $n, String $de, DateTime $da) {
        $this->nom = $n;
        $this->desc = $de;
        $this->date = $da;
    }

    public function getArticleName() : String {
        return $this -> nom;
    }

    public function getArticleDescription() : String {
        return $this->desc;
    }

    public function getArticleDate() : DateTime {
        return $this -> date;
    }

}