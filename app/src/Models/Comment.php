<?php

class Comment {
    public $id;
    public $postId;
    public $userId;
    public $content;
    public $createdAt;

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
