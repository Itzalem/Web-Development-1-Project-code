<?php

namespace app\src\Repositories;

use PDO;
use app\Framework\Repository;
use app\src\Models\Post;
use app\Models\User;

class PostRepository extends Repository
{  
    public function buildPostModel(array $postData): Post
    {
        $post = new Post();
        $post->id = $postData['id'];
        $post->createdAt = $postData['created_at'];
        $post->caption = $postData['caption'];
        $post->userId = $postData['user_id'];
        $post->songId = $postData['song_id'];
        return $post;
    }

    public function getPostByUserId(User $user): ?Post
    {
        $sql = "SELECT * FROM POSTS WHERE user_id = :id";

        $connection = $this->getConnection();
        $statement = $connection->prepare($sql);

        $statement->bindParam(':id', $user->userId, PDO::PARAM_INT);//por que ::

        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
         
        return $this->buildPostModel($userData) ?: null; //why 
    }
   
    public function createPost(Post $post): int
    {
        // 1. Definimos el SQL con marcadores para evitar Inyección SQL [cite: 1233]
        $sql = "INSERT INTO POSTS (caption, user_id, song_id, created_at) 
                VALUES (:caption, :user_id, :song_id, NOW())";

        // 2. Preparamos la sentencia usando el método de la clase base [cite: 1231, 1811]
        $connection = $this->getConnection();
        $statement = $connection->prepare($sql);

        // 3. Vinculamos los datos del objeto UserModel a los marcadores [cite: 1250-1252]
        $statement->bindParam(':caption', $post->caption);
        $statement->bindParam(':user_id', $post->userId, PDO::PARAM_INT);
        $statement->bindParam(':song_id', $post->songId, PDO::PARAM_INT);

        // 4. Ejecutamos la orden en la base de datos [cite: 1254]
        $statement->execute();

        return (int)$connection->lastInsertId();
    }

    public function updatePost(Post $post): int
    {
        // 1. Definimos el SQL con marcadores para evitar Inyección SQL [cite: 1233]
        $sql = "UPDATE POSTS SET caption = :caption, user_id = :user_id, song_id = :song_id WHERE id = :id";


        // 2. Preparamos la sentencia usando el método de la clase base [cite: 1231, 1811]
        $connection = $this->getConnection();
        $statement = $connection->prepare($sql);

        // 3. Vinculamos los datos del objeto UserModel a los marcadores [cite: 1250-1252]
        $statement->bindParam(':caption', $post->caption);
        $statement->bindParam(':user_id', $post->userId, PDO::PARAM_INT);
        $statement->bindParam(':song_id', $post->songId, PDO::PARAM_INT);
        $statement->bindParam(':id', $post->id, PDO::PARAM_INT);

        // 4. Ejecutamos la orden en la base de datos [cite: 1254]
        $statement->execute();

        return (int)$connection->lastInsertId();
    }

    public function deletePost(int $id): void
    {
        $sql = "DELETE FROM POSTS WHERE id = :id";

        $connection = $this->getConnection();
        $statement = $connection->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();
    }
}