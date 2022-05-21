<?php

namespace App\Services;

use App\Dto\PagePagination;
use App\Dto\Request\Post\PostCreateRequest;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostService implements PostServiceInterface
{
    use ApiResponser;

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    /**
     * @throws UnknownProperties
     */
    public function store(PostCreateRequest $requestOne): JsonResponse
    {
        $data = [
            'title' => $requestOne->title,
            'excerpt' => $requestOne->excerpt,
            'content' => $requestOne->content,
            'slug' => $requestOne->slug,
            'imageUrl' => $requestOne->image_url,
            'published' => $requestOne->published,
            'categoryId' => $requestOne->category_id
        ];
        return $this->successResponse(PagePagination::createPage([$data]), "success");
    }

    public function update(\App\Dto\Request\Post\PostUpdateRequest $requestOne, string $id)
    {
        // TODO: Implement update() method.
    }
}
