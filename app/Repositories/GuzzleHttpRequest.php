<?php

namespace App\Repositories;

use GuzzleHttp\Client;

/**
 * Description of GuzzleHttpRequest
 *
 * @author user
 */
class GuzzleHttpRequest {

    protected $client;

    public function __construct(Client $client) {
        $this->client = new Client([
            'base_uri' => 'http://108.163.227.76:5984/',
            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'auth' => ['admin', 'Webmaster2017#@']
        ]);
    }

    protected function get($url, $params = []){
        $res = $this->client->request('GET', $url, [
            'query' => $params
        ]);

        return json_decode( $res->getBody()->getContents() );
    }

    protected function post($url, $data){
        $res = $this->client->request('POST', $url, [
            'json' => $data
        ]);

        return json_decode( $res->getBody()->getContents() );
    }

}
