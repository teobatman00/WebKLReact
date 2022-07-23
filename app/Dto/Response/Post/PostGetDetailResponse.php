<?php

namespace App\Dto\Response\Post;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostGetDetailResponse extends DataTransferObject
{
    public string $id;
    public string $title;
    public string $excerpt;
    public string $content;
    public bool $published;
    public string $imageUrl;
    public array $categories;

    /**
     * @throws UnknownProperties
     */
    public static function fromData($data): PostGetDetailResponse
    {
        $categoryList = [];
        foreach ($data['categories'] as $item) {
            $appendList = [
                'title' => $item['title'],
                'slug' => $item['slugs']
            ];
            $categoryList[] = $appendList;
        }

        return new static([
            'id' => $data['id'],
            'title' => $data['title'],
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'published' => $data['published'],
            'imageUrl' => $data['image_url'],
            'categories' => $categoryList
        ]);
    }
}
