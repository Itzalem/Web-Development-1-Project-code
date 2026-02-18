<?php

namespace app\src\Services\Interfaces;

use app\Models\User;
use app\Models\ESongType;

interface ISongService
{
    public function getSongsByUser(User $user, ESongType $songType): array;
    
}