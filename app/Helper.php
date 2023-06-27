<?php
namespace App;

class Helper
{
    public static function createFrontAnswer(string $text, mixed $data = null):string {
        return json_encode(
            [
                'status' => $text,
                'data' => $data
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
