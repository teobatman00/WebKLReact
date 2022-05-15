<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    protected $model = Post::class;

}
