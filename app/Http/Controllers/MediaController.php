<?php

namespace App\Http\Controllers;

use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{

    private MediaService $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function getMediaFile(string $bucketName, string $objectName) {
        Log::info("Getting file");
        return $this->mediaService->getMediaFile($bucketName, $objectName);
    }

}
