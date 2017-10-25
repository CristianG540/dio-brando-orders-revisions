<?php

namespace App\Repositories\Couchdb;

use App\Repositories\GuzzleHttpRequest;

class Usuarios extends GuzzleHttpRequest
{

    public function all() {
        return $this->get("_all_dbs");
    }

}
