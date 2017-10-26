<?php

namespace App\Http\Controllers;

use App\Repositories\Couchdb\Ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{

    protected $ordenes;

    public function __construct(Ordenes $ordenes)
    {
        $this->middleware('auth');
        $this->ordenes = $ordenes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $this->ordenes->usuario = $user;
        $ordenes = $this->ordenes->all();
        //dd($this->ordenes->delete(1508445455316));
        return view('orders', compact('ordenes', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user, $id)
    {
        $this->ordenes->usuario = $user;
        $res = $this->ordenes->delete($id);

        if(isset($res->ok) && $res->ok){
            return back();
        }else{
            return back()->withErrors(['msg'=> json_encode($res)]);
        }
    }
}
