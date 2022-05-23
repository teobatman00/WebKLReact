<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    protected $model = Tag::class;
}
