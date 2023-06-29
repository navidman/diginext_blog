<?php

namespace App\Repositories;


use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoRepository implements VideoRepositoryInterface
{
    public function save($data)
    {
        $video = new Video($data);
        $video->save();
        return $video;
    }

    public function getById($id)
    {
        $video = Video::select(['id', 'title', 'url', 'user_username'])->whereId($id)->firstOrFail();
        return $video;
    }

}
