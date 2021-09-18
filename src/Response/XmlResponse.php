<?php


namespace App\Response;


use Symfony\Component\HttpFoundation\Response;

class XmlResponse
{


    public static function generate($data, $root = 'result')
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';

            if(is_array($data)){
                if(count($data)>1){
                    $xml .= '<'.$root.'>';
                }
                $xml .= self::arrayToXml((array)$data);
                if(count($data)>1){
                    $xml .= '</'.$root.'>';
                }
            }else{
                $xml .= '<'.$root.'>';
                $xml .= (string)$data;
                $xml .= '</'.$root.'>';
            }

        return new Response($xml, 200, ['Content-type' => 'text/xml']);
    }


    protected static function arrayToXml($data)
    {
        $xml = '';
        foreach ($data as $index => $item){
            $xml .= '<'.(is_int($index) ? 'item' : $index) .'>';
            $xml .= is_array($item) ? self::arrayToXml($item) : $item;
            $xml .= '</'.(is_int($index) ? 'item' : $index) .'>';
        }
        return $xml;
    }
}