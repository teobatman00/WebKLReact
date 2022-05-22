<?php

namespace App\Services;

use App\Dto\PagePagination;
use App\Dto\Request\Post\PostCreateRequest;
use App\Dto\Response\Category\CategoryGetDetailResponse;
use App\Dto\Response\Post\PostGetDetailResponse;
use App\Dto\Response\Post\PostGetListResponse;
use App\Exceptions\NotFoundDataException;
use App\Models\Post;
use App\Models\User;
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
     * @throws NotFoundDataException
     */
    public function store(PostCreateRequest $requestOne): JsonResponse
    {
        $listCategory = [];
        foreach ($requestOne->categories as $category) {
            $categoryData = $this->categoryRepository->findOneByPrimary($category);
            if ($categoryData == null) {
                throw new NotFoundDataException("Category not found");
            }
            $listCategory[] = $categoryData;
        }
        $saveData = $requestOne->all();
        $saveData['categories'] = $listCategory;
        \Log::info("Saving new category");
        $this->postRepository->createOrUpdateFromArray($saveData);
        return $this->successResponse(null, "success");
    }

    public function update(\App\Dto\Request\Post\PostUpdateRequest $requestOne, string $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @throws UnknownProperties
     */
    public function index(\Illuminate\Http\Request $request): JsonResponse
    {
        $perPage = 15;
        if ($request->get('perPage') != null) {
            $perPage = $request->get('perPage');
        }

        \Log::info("Getting list page");
        $data =  $this->postRepository->findAll(
            column: ['id', 'title', 'excerpt', 'slugs', 'image_url', 'published'],
            orderByDirection: 'desc'
        );
        $data = $this->postRepository->paginateArrayResults($data->all(), $perPage);
        $result = [];
        foreach ($data->all() as $item) {
            $appendItem = PostGetListResponse::fromData($item);
            $result[] = $appendItem;
        }
        return $this->successResponse(PagePagination::createPage(
            content: $result,
            first: $data->currentPage(),
            last: $data->lastPage(),
            totalElement: $data->total()
        ), "Success");
    }

    /**
     * @throws UnknownProperties
     */
    public function show(string $id): JsonResponse
    {
        \Log::info("Getting post by id {$id}");
        $data = $this->postRepository->findOneByPrimary($id);
        $categories = $data->categories;
        $data['categories'] = $categories;
        return $this->successResponse(PostGetDetailResponse::fromData($data), "success");
    }
}
