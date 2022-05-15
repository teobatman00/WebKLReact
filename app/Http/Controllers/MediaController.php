<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\MediaServiceInterface;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{

    private MediaServiceInterface $mediaService;

    public function __construct(MediaServiceInterface $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function getMediaFile(string $bucketName, string $objectName) {
        Log::info("Getting file");
        return $this->mediaService->getMediaFile($bucketName, $objectName);
    }

}
