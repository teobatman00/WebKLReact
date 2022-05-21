<?php

namespace App\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PagePagination extends DataTransferObject
{
    public int $first;
    public int $last;
    public int $totalElement;
    public array $content;

    /**
     * @throws UnknownProperties
     */
    public static function createPage(array $content, int $first = 0, int $last = 0, int $totalElement = 0): PagePagination
    {
        return new static([
            'first' => $first,
            'last' => $last,
            'totalElement' => $totalElement,
            'content' => $content
        ]);
    }
}
