<?php

namespace App\Http\Responses;

class API
{
    public static $data;

    public function item($item)
    {
        return array_push(self::$data, $item);
    }

    public static function success($data = null)
    {
        $response = [
            'code'  => 0,
            'msg'   => 'success',
            'data'  => $data,
        ];

        return response()->json($response);
    }

    public static function error(array $code_array, $extra = null)
    {
        $response = [
            'code'  => $code_array[0],
            'msg'   => $code_array[1],
            'extra' => $extra,
        ];

        return response()->json($response);
    }
}