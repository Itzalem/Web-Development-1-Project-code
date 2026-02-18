<?php

namespace app\src\Services;

use app\Models\User;
use app\Models\ESongType;
use app\src\Services\Interfaces\ISongService;

class SongService implements ISongService
{
    private $songRepository;
    //private $postRepository;

    public function __construct($songRepository, $postRepository)
    {
        $this->songRepository = $songRepository;
        //$this->postRepository = $postRepository;
    }

    public function getSongsByUser(User $user, ESongType $songType): array 
    {
        return $this->songRepository->getSongsByUser($user, $songType);
    }

}