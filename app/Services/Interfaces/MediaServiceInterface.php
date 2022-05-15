<?php

namespace App\Services\Interfaces;

interface MediaServiceInterface
{

    public function getMediaFile(string $bucketName, string $objectName);

}
