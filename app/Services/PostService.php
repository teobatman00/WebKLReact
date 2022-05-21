<?php

namespace App\Services;

use App\Dto\PagePagination;
use App\Dto\Request\Post\PostCreateRequest;
use App\Dto\Response\Category\CategoryGetDetailResponse;
use App\Exceptions\NotFoundDataException;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostService implements PostServiceInterface
{
    use ApiResponse;

    private PostRepositoryInterface $postRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @throws UnknownProperties
     * @throws NotFoundDataException
     */
    public function store(PostCreateRequest $requestOne): JsonResponse
    {
        $categoryData = $this->categoryRepository->findOneByPrimary($requestOne->category_id, false);
        if ($categoryData == null) {
            throw new NotFoundDataException("Category not found");
        }
        return $this->successResponse(CategoryGetDetailResponse::fromData($categoryData), "success");
    }

    public function update(\App\Dto\Request\Post\PostUpdateRequest $requestOne, string $id)
    {
        // TODO: Implement update() method.
    }
}
