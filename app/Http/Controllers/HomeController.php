<?php

namespace App\Http\Controllers;

use App\Repositories\Couchdb\Usuarios;
use App\Repositories\Couchdb\Ordenes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $usuarios;
    protected $ordenes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Usuarios $usuarios, Ordenes $ordenes)
    {
        $this->middleware('auth');
        $this->usuarios = $usuarios;
        $this->ordenes = $ordenes;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->usuarios->all();

        $usuarios = array_map(function($user){

            $this->ordenes->usuario = $user;
            $orders = $this->ordenes->all();

            $ordersErr = array_filter($orders->rows, function($order){
                return (isset($order->doc->error) && $order->doc->error) || !isset($order->doc->docEntry) || $order->doc->docEntry == "" ;
            });

            return [
                "nombre"      => $user,
                "errores"     => count($ordersErr),
                "cantOrdenes" => count($orders->rows)
            ];


        }, $usuarios);

        //dd($usuarios);

        return view('home', compact('usuarios'));
    }
}
