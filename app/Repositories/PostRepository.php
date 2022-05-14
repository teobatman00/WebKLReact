<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function getModel(): string
    {
        return \App\Models\Post::class;
    }
}
