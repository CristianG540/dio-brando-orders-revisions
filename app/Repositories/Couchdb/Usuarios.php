<?php

namespace App\Repositories\Couchdb;

use App\Repositories\GuzzleHttpRequest;

class Usuarios extends GuzzleHttpRequest
{

    public function all() {
        $allDbs = $this->get("_all_dbs");

        $usuarios = array_map(function($db){
            $db = explode("$", $db);
            if( $db[0] == "supertest" ){
                return $db[1];
            }
        }, $allDbs);

        return array_filter($usuarios);
    }

}
