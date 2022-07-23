<?php

namespace App\Repositories;

use App\Models\Storage;
use App\Repositories\Interfaces\MediaRepositoryInterface;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    protected $model = Storage::class;
}
