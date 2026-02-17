<?php

class Post {
    public $id;
    public $userId;
    public $songId;   // ahora el post apunta directamente a la canción
    public $caption;
    public $createdAt;

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
