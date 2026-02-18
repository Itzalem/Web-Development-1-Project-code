<?php

namespace app\Services;

use app\Models\User;

class UserService {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getUserById(int $id): ?array {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(User $user): int {

        //ver lo de que si cambia la contraseña o no, porque si no se cambia, no se debería hashear de nuevo
        if ($user->passwordHash === null) {
            // Si no se proporciona una nueva contraseña, obtenemos la actual de la base de datos
            $currentUserPassword = $this->getUserById($user->userId);
                $hashedPassword = $currentUserPassword['password'];
            
        } else {
        $hashedPassword = password_hash($user->passwordHash, PASSWORD_BCRYPT);

        
    }
    $user->passwordHash = $hashedPassword;
    return $this->userRepository->createUser($user);
    }

    public function updateUser(User $user): int
    {
        return $this->userRepository->updateUser($user);
    }

    public function deleteUser(int $id): void
    {
        $this->userRepository->deleteUser($id);
    }


   
}