<?php

namespace App\Http\Controllers;

use App\Repositories\Couchdb\Usuarios;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $usuarios;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Usuarios $usuarios)
    {
        $this->middleware('auth');
        $this->usuarios = $usuarios;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->usuarios->all();
        return view('home', compact('usuarios'));
    }
}
