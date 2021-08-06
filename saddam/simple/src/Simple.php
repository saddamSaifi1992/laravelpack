<?php 

namespace Saddam\Simple;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class Simple {

    public static function event(string $name, float $value, ?string $dimension =null )
    {
        $json = [
            'name'=>$name,
            'value'=>$value,
        ];
        if($dimension){
            $json['dimension'] = $dimension;
        }
        
        $client = new Client([
             'base_uri' => 'https://qckm.io',

         ]);
        
         try{
             $req = $client->request('post','json', [
                'json'=> $json ,
                'headers' => [
                    'x-qm-key'=>config('simpleconfig.key'),
                ]
            ]);
            return response()->json([
                'code'=> $req->getStatusCode(),
                'message'=> $req->getReasonPhrase(),
            ]);
         }catch(GuzzleException $e){
            //
            return response()->json([
                'error'=> $e->getMessage()
            ],500);
         }
    }
}