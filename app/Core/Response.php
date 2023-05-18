<?php
declare(strict_types = 1);

namespace App\Core;

class Response
{
    public static function Json(array $data=[],int $status=200):void
    {
        header_remove();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($status);
        echo json_encode($data);
        exit();
    }
}