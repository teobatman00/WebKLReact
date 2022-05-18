<?php

namespace App\Services;

use App\Dto\Request\Post\PostCreateRequest;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class PostService implements PostServiceInterface
{
    use ApiResponser;

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function store(PostCreateRequest $requestOne)
    {
        // TODO: Implement store() method.
    }
}
