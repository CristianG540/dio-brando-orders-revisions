@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ordenes</div>

                <div class="panel-body" >
                    <div class="list-group">
                        @foreach ($ordenes->rows as $orden)
                            <a href="/ordenes/delete/1" class="list-group-item list-group-item-action">
                               {{ $orden->id }} | {{ count($orden->doc->items) }} | {{ date( "d-m-Y h:i a", intval($orden->id/1000) ) }}
                            </a>
                        @endforeach
                    </div>
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
