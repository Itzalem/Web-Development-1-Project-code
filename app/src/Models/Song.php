<?php

class Song {
    public $id;
    public $title;
    public $artist;
    public $album;
    public $genre;
    public $link;

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
