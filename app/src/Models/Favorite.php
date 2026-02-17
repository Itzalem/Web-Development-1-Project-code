<?php

class Favorite extends Interaction {
    public $favoriteId;
    public $ownerUserId;        //User owner of the favorite list
    public $sourceUserId;  //User where the favorite is coming from (can be the same as ownerUserId if it's a self-favorite)
   

    public function __construct($data = []) {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}