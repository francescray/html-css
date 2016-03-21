<?php

namespace App\Http\Controllers;

use App\Http\Responses\API;
use App\Lib\File\FileUpload;
use App\Lib\File\FileUploadException;

class UploadController extends Controller
{
    public function image()
    {
        $config = [
            'rootDir'       => 'uploads/images',
            'subDir'        => 'Y-m-d',
            'maxSize'       => 5000000,
            'extensions'    => ['jpg', 'png', 'jpeg', 'bmp', 'gif'],
        ];

        try {
            $file = new FileUpload('file', $config);
            $info = $file->upload();
            return API::success($info);
        } catch (FileUploadException $e) {
            return API::error([$e->getCode(), $e->getMessage()]);
        }
    }
}