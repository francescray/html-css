<?php

namespace App\Lib\File;

class FileUploadException extends \Exception
{
    public function __construct($code, $message)
    {
        parent::__construct($message, $code);
    }
}