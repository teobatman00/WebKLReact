<?php

namespace App\Dto\Response\Category;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryGetDetailResponse extends DataTransferObject
{
    public string $title;
    public string $slugs;
    public string $description;

    /**
     * @throws UnknownProperties
     */
    public static function fromData(mixed $data): CategoryGetDetailResponse
    {
        return new static([
            'title' => $data['title'],
            'slugs' => $data['slugs'],
            'description' => $data['description']
        ]);
    }
}
