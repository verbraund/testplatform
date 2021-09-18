<?php


namespace App\Response;

use Symfony\Component\HttpFoundation\Response;

class TxtResponse
{

    public static function generate($data)
    {

        return new Response(
            (is_array($data) or is_object($data)) ? self::arrayToText((array)$data) : $data,
            200, ['Content-type' => 'text/plain']
        );
    }

    protected static function arrayToText($array)
    {
        $result = '';
        foreach ($array as $index => $item){
            if(is_array($item)){
                $result .=  $index . '=' . self::arrayToText($item) . ';';
            }else{
                $result .= $index . '=' . $item . ';';
            }
        }
        return $result;
    }

}