<?php

namespace app\src\Repositories\Interfaces;

use app\Models\User;
use app\Models\ESongType;

interface ISongRepository
{
    public function getSongsByUser(User $user, ESongType $songType): array ;
}