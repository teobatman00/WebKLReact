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
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostService implements PostServiceInterface
{
    use ApiResponse;

    private PostRepositoryInterface $postRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private TagRepositoryInterface $tagRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        TagRepositoryInterface $tagRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }


    /**
     * @throws NotFoundDataException
     */
    public function store(PostCreateRequest $requestOne): JsonResponse
    {
        $listCategory = [];
        foreach ($requestOne->categories as $category){
            $categoryData = $this->categoryRepository->findOneByPrimary($category);
            if ($categoryData == null) {
                throw new NotFoundDataException("Category not found");
            }
            $listCategory[] = $categoryData;
        }
        $listTag = [];
        foreach ($requestOne->tags as $tag){
            $tagData = $this->tagRepository->findOneByPrimary($tag);
            if ($tagData == null)
                throw new NotFoundDataException("Tag not found");
            $listTag[] = $tagData;
        }
        $saveData = $requestOne->all();
        $saveData['categories'] = $listCategory;
        $saveData['tags'] = $listTag;
        \Log::info("Saving new post");
        $this->postRepository->createOrUpdateFromArray($saveData);
        return $this->successResponse(null, "success");
    }

    /**
     * @throws NotFoundDataException
     */
    public function update(\App\Dto\Request\Post\PostUpdateRequest $requestOne, string $id): JsonResponse
    {
        $existPost = $this->postRepository->findOneByPrimary($id, false);
        if ($existPost == null){
            throw new NotFoundDataException("Post not found");
        }
        $listCategory = [];
        foreach ($requestOne->categories as $category){
            $existCategory = $this->categoryRepository->findOneByPrimary($category);
            if (! $existCategory){
                throw new NotFoundDataException("Category not found");
            }
            $listCategory[] = $existCategory;
        }
        $listTag = [];
        foreach ($requestOne->tags as $tag){
            $existTag = $this->tagRepository->findOneByPrimary($tag);
            if (! $existTag){
                throw new NotFoundDataException("Tag not found");
            }
            $listTag[] = $existTag;
        }
        $updateData = $requestOne->all();
        $updateData['id'] = $id;
        $updateData['categories'] = $listCategory;
        $updateData['tags'] = $listTag;
        \Log::info("Updating post");
        $this->postRepository->createOrUpdateFromArray($updateData);
        return $this->successResponse(null, "success");
    }

    /**
     * @throws UnknownProperties
     */
    public function index(\Illuminate\Http\Request $request): JsonResponse
    {
        $perPage = 15;
        if ($request->get('perPage') != null){
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
            last: $data->lastPage(), totalElement: $data->total()
        ),"Success");
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

    /**
     * @throws NotFoundDataException
     */
    public function destroy(string $id): JsonResponse
    {
        $existData = $this->postRepository->findOneByPrimary($id);
        if ($existData == null){
            \Log::error("No post to delete");
            throw new NotFoundDataException("No post to delete");
        }
        \Log::info("Deleting post {$id}");
        $this->postRepository->deleteByPrimary($id);
        return $this->successResponse(null, "Success");
    }
}
