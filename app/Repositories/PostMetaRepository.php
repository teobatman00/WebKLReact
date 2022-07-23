<?php

namespace App\Repositories;

use App\Models\PostMeta;
use App\Repositories\Interfaces\PostMetaRepositoryInterface;

class PostMetaRepository extends BaseRepository implements PostMetaRepositoryInterface
{
    protected $model = PostMeta::class;

}
