<?php

namespace App\Dto\Response\Post;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostGetListResponse extends DataTransferObject
{
    public string $title;
    public string $excerpt;
    public string $imageUrl;

    /**
     * @throws UnknownProperties
     */
    public static function fromData(array $data): PostGetListResponse
    {
        return new static([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'imageUrl' => $data['image_url']
        ]);
    }
}
