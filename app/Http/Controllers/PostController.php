<?php

namespace App\Http\Controllers;

use App\Dto\Request\Post\PostCreateRequest;
use App\Http\Requests\Post\PostCreateFormRequest;
use App\Services\Interfaces\PostServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostController extends Controller
{
    use ApiResponser;
    private PostServiceInterface $postService;


    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
