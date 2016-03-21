<?php

namespace App\Lib\File;

use Illuminate\Support\Facades\Request;

class FileUpload
{
    protected $fileFiled;

    protected $config = array();

    protected $info = array();

    public function __construct($fileField, $config = array())
    {
        $this->config = $config;

        $this->fileFiled = $fileField;
    }

    public function upload()
    {
        if (! Request::hasFile($this->fileFiled)) {
            throw new FileUploadException(100001, '没有该文件');
        }

        $file = Request::file($this->fileFiled);

        if (! $file->isValid()) {
            throw new FileUploadException(100002, '文件上传失败');
        }

        // 获取信息
        $originalName   = $file->getClientOriginalName();
        $mimeType       = $file->getClientMimeType();
        $fileSize       = $file->getClientSize();
        $extension      = strtolower($file->getClientOriginalExtension());

        // 判断后缀
        if (isset($this->config['extensions'])) {
            if (! in_array($extension, $this->config['extensions'])) {
                throw new FileUploadException(100003, '不支持的文件类型');
            }
        }

        // 判断大小
        if (isset($this->config['maxSize'])) {
            if ($fileSize > $this->config['maxSize']) {
                throw new FileUploadExceptions(100004, '文件大小超过最大上传限制');
            }
        }

        // 创建目录结构
        $sub = isset($this->config['subDir']) ? '/' . trim(date($this->config['subDir'], time()), "/\\") . '/' : '/';
        $dir = trim($this->config['rootDir'], "/\\") . $sub;

        // 文件名
        if (isset($this->config['filename'])) {
            $filename = $this->config['filename'];
        } else {
            $filename = time() . str_random(10) . '.' . $extension;
        }

        $file->move($dir, $filename);
        if ($file->getError() != 0) {
            throw new FileUploadException(100005, '移动文件失败');
        }

        return [
            'originalName'  => $originalName,
            'filename'      => $filename,
            'path'          => $dir . $filename,
            'fileSize'      => $fileSize,
            'mimeType'      => $mimeType,
        ];
    }

    public function config(array $config)
    {
        $this->config = $config;
    }

    public static function url($path)
    {
        if (empty($path)) {
            return '';
        }

        $base = env('FILE_UPLOAD_BASE_URL', '');
        $url = rtrim($base, "\\/") . '/' . $path;
        return $url;
    }
}