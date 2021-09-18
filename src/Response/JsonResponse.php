<?php


namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse as JsonResponseComponent;

class JsonResponse
{

    public static function generate($data)
    {
        return new JsonResponseComponent($data);
    }

}