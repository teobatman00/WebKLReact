<?php

namespace App\Dto\Request\Post;

use App\Http\Requests\Post\PostUpdateFormRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostUpdateRequest extends DataTransferObject
{
    public string $title;
    public string $excerpt;
    public string $content;
    public string $slugs;
    public string $image_url;
    public bool $published;
    public array $categories;
    public array $tags;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(PostUpdateFormRequest $formRequest): PostUpdateRequest{
        return new static([
            'title' => $formRequest->input('title'),
            'excerpt' => $formRequest->input('excerpt'),
            'content' => $formRequest->input('content'),
            'slugs' => $formRequest->input('slug'),
            'image_url' => $formRequest->input('imageUrl'),
            'published' => $formRequest->input('published'),
            'categories' => $formRequest->input('categoryId'),
            'tags' => $formRequest->input('tagId')
        ]);
    }
}
