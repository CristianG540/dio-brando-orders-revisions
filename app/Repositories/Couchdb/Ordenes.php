<?php

namespace App\Repositories\Couchdb;

use App\Repositories\GuzzleHttpRequest;

class Ordenes extends GuzzleHttpRequest
{

    protected $usuario;
    protected $ordenes;

    public function all() {
        $this->ordenes = $this->get("supertest$".$this->usuario."/_all_docs", [
            'include_docs' => 'true'
        ]);
        return $this->ordenes;
    }

    public function delete($id) {
        /*$ordenes = array_map(function($orden){
            return $orden['_deleted'] = true;
        }, $ordenes);*/

        /**
         * Le pongo ordenes por que aun que este buscando por un id especifico
         * array_filter me devuelve un array asi sea con un solo resultado
         */
        $orden = array_filter($this->ordenes->rows, function($orden) use ($id){
            return $orden->id == $id;
        })[0]->doc;
        $orden->_deleted = true;

        $res = $this->post("supertest$".$this->usuario."/_bulk_docs", [
            "docs" => [$orden]
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
