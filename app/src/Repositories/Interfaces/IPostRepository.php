<?php

namespace app\Repositories\Interfaces;
use app\Models\Post;
use app\Models\User;

interface IPostRepository
{
    public function getPostByUserId(User $user): ?Post;
   
    public function createPost(Post $post): int;

    public function updatePost(Post $post): int;

    public function deletePost(int $id): void;
}


