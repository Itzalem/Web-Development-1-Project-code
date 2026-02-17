<?php

namespace app\src\Repositories;

use app\Framework\Repository;
use app\src\Repositories\Interfaces\ISongRepository;
use app\Models\Song;
use app\Models\User;
use PDO;
use app\Models\ESongType;

class SongRepository extends Repository implements ISongRepository
{
    
    public function getSongsByUser(User $user, ESongType $songType): array 
{
    if($songType === ESongType::FAVORITE) {
       $sql = "SELECT s.id, s.title, s.artist, s.album, s.genre, s.link 
            FROM SONGS s
            JOIN FAVORITES f ON s.id = f.song_id
            WHERE f.user_id = :userId";
        
    }
    else if($songType === ESongType::LIKED) {
        $sql = "SELECT s.id, s.title, s.artist, s.album, s.genre, s.link 
            FROM SONGS s
            JOIN LIKES f ON s.id = f.song_id
            WHERE f.user_id = :userId";
    }

    $statement = $this->getConnection()->prepare($sql);

    $statement->bindParam(':userId', $user->userId, PDO::PARAM_INT);
    $statement->execute(); 

    // fetchAll nos devuelve el "array de canciones" que buscabas [cite: 1086-1087]
    // Usamos FETCH_CLASS para que cada canción sea un objeto SongModel [cite: 1748-1751]
    return $statement->fetchAll(PDO::FETCH_CLASS, Song::class);
}
}

