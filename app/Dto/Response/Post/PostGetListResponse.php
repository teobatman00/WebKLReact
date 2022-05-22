<?php

namespace App\Dto\Response\Post;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostGetListResponse extends DataTransferObject
{
    public string $id;
    public string $title;
    public string $excerpt;
    public string $imageUrl;
    public string $slug;
    public bool $published;

    /**
     * @throws UnknownProperties
     */
    public static function fromData($data): PostGetListResponse
    {
        return new static([
            'id' =>$data['id'],
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'imageUrl' => $data['image_url'],
            'slug' => $data['slugs'],
            'published' => $data['published']
        ]);
    }
}
