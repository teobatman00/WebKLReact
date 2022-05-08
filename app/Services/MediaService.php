<?php

namespace App\Services;

use App\Enums\FileType;
use App\Traits\ApiResponser;
use App\Traits\GlobalConstant;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    use ApiResponser, GlobalConstant;

    public function getMediaFile(string $bucketName, string $objectName) {
        if (! Storage::disk('public')->exists($bucketName.'/'.$objectName)){
            Log::error(Lang::get(self::$exceptionNotFoundKey.'.file_object'));
            return $this->notFoundResponse(null, Lang::get(self::$exceptionNotFoundKey.'.file_object'));
        }
        
        return response()->make(public_path().'/storage/'.$bucketName.'/'.$objectName);
    }






}
