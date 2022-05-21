<?php

namespace App\Dto\Response\Post;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostCreateResponse extends DataTransferObject
{
    public string $title;
    public string $excerpt;
    public string $content;
    public string $slug;
    public string $imageUrl;
    public bool $published;
    public string $categoryId;

    /**
     * @throws UnknownProperties
     */
    public static function fromData(array $data): PostCreateResponse
    {
        return new static([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'imageUrl' => $data['image_url'],
            'published' => $data['published'],
            'categoryId' => $data['category_id']
        ]);
    }
}
