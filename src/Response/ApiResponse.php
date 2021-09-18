<?php


namespace App\Response;


class ApiResponse
{

    public static function generate($request, $data)
    {
        switch ($request->getRequestFormat()){
            case 'txt':
                return TxtResponse::generate($data);
            case 'xml':
                return XmlResponse::generate($data);
            default:
                return JsonResponse::generate($data);

        }
    }
}