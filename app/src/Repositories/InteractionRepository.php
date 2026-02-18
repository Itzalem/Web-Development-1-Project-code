<?php

namespace app\src\Repositories;

use app\Framework\Repository;

class InteractionRepository extends Repository
{
    //not mine
    /*
    public function addInteraction(int $userId, int $songId, string $interactionType): void
    {
        $connection = $this->getConnection();
        $stmt = $connection->prepare("INSERT INTO interactions (user_id, song_id, interaction_type) VALUES (:userId, :songId, :interactionType)");
        $stmt->execute([
            ':userId' => $userId,
            ':songId' => $songId,
            ':interactionType' => $interactionType
        ]);
    }*/

}