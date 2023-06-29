<?php

namespace App\Services;

use App\Repositories\Interfaces\VideoRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class VideoService
{
    protected $videoRepository;
    protected $userRepository;

    public function __construct(VideoRepositoryInterface $videoRepository, UserRepositoryInterface $userRepository)
    {
        $this->videoRepository = $videoRepository;
        $this->userRepository = $userRepository;
    }

    public function createVideo($data)
    {
        return $this->videoRepository->save([
            'title' => $data->title,
            'url' => $data->url,
            'user_username' => $this->getUsernameFromUserId($data->header('User-ID'))
        ]);
    }

    public function getVideo($id)
    {
        $video = $this->videoRepository->getById($id);
        return $video->load('comments');
    }

    private function getUsernameFromUserId($userId)
    {
        $user = $this->userRepository->getById($userId);
        return $user->username;
    }
}
