<?php

namespace App\Http\Controllers;

use App\Dto\Request\Post\PostCreateRequest;
use App\Dto\Request\Post\PostUpdateRequest;
use App\Http\Requests\Post\PostCreateFormRequest;
use App\Http\Requests\Post\PostUpdateFormRequest;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostController extends Controller
{
    private PostServiceInterface $postService;


    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->postService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateFormRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function store(PostCreateFormRequest $request): JsonResponse
    {
        $requestOne = PostCreateRequest::fromRequest($request);
        return $this->postService->store($requestOne);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return $this->postService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateFormRequest $request
     * @param string $id
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function update(PostUpdateFormRequest $request, string $id): JsonResponse
    {
        $requestOne = PostUpdateRequest::fromRequest($request);
        return $this->postService->update($requestOne, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->postService->destroy($id);
    }
}
