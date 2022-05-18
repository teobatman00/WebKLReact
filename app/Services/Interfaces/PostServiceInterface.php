<?php

namespace App\Services\Interfaces;

use App\Dto\Request\Post\PostCreateRequest;
use Illuminate\Http\JsonResponse;

interface PostServiceInterface
{

    public function store(PostCreateRequest $requestOne);
}
