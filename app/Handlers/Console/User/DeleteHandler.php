<?php
declare(strict_types=1);

namespace App\Handlers\Consoe\User;

use App\Exceptions\User\DoesNotExistException;
use App\Repository\User\UserRepository;

class DeleteHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $username        User who needs to assign a role. User is identified by username.
     */
    public function handle(string $username)
    {
        $user = $this->userRepository->findByUsername($username);
        if ($user === null) {
            throw new DoesNotExistException($username);
        }

        $this->userRepository->remove($user);
    }
}
