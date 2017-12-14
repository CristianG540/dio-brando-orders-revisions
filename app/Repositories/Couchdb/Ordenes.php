<?php

namespace App\Repositories\Couchdb;

use App\Repositories\GuzzleHttpRequest;

class Ordenes extends GuzzleHttpRequest
{

    protected $usuario;
    protected $ordenes;
    protected $orden;

    public function all() {
        $this->ordenes = $this->get("supertest%24{$this->usuario}/_all_docs", [
            'include_docs' => 'true',
            'descending'   => 'true'
        ]);
        return $this->ordenes;
    }

    public function find($id) {
        $this->orden = $this->get("supertest%24{$this->usuario}/{$id}");
        return $this->orden;
    }

    public function delete($id) {
        $this->find($id);
        $this->orden->_deleted = true;

        $res = $this->post("supertest%24{$this->usuario}/_bulk_docs", [
            "docs" => [$this->orden]
        ]);
        return $res[0];
    }

    public function seen($id) {
        date_default_timezone_set('America/Bogota');
        $this->find($id);
        $this->orden->estado = "seen";
        $this->orden->updated_at = (string)round(microtime(true) * 1000);

        $res = $this->post("supertest%24{$this->usuario}/_bulk_docs", [
            "docs" => [$this->orden]
        ]);
        return $res[0];
    }

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}
