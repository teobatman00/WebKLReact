<?php

namespace App\Dto\Request\Post;

use App\Http\Requests\Post\PostCreateFormRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostCreateRequest extends DataTransferObject
{
    public string $title;
    public string $excerpt;
    public string $content;
    public string $slug;
    public string $image_url;
    public bool $published;
    public string $category_id;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(PostCreateFormRequest $formRequest): PostCreateRequest
    {
        return new static([
            'title' => $formRequest->input('title'),
            'excerpt' => $formRequest->input('excerpt'),
            'content' => $formRequest->input('content'),
            'slug' => $formRequest->input('slug'),
            'image_url' => $formRequest->input('imageUrl'),
            'published' => $formRequest->input('published'),
            'category_id' => $formRequest->input('categoryId')
        ]);
    }
}
