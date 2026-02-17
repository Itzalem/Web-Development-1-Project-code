<?php

namespace app\src\Repositories\Interfaces;

use App\Models\User;

interface IUserRepository
{
    //public function getUserById(int $id): ?array;
    //public function getUserByUsername(string $username): ?array;
    public function createUser(User $user): int;
}