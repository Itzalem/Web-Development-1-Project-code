<?php

class Interaction {

    public $postId;
    public $songId; // para poder mostrar interacciones por canción
    public $createdAt;

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}