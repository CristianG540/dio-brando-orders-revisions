@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info" href="/" role="button">Regresar</a>
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Ordenes</div>

                <div class="panel-body" >
                    <div class="list-group">
                        @foreach ($ordenes->rows as $orden)
                            <li class="list-group-item clearfix">
                                <a href="/ordenes/{{ $user }}/show/{{ $orden->id }}" @isset( $orden->doc->error ) style="color: red;" @endisset>
                                    {{ $orden->id }} | {{ count($orden->doc->items) }} | {{ date( "d-m-Y h:i a", intval($orden->id/1000) ) }}
                                    @isset( $orden->doc->error )
                                    <span class="badge badge-error">error</span>
                                    @endisset
                                </a>

                                <span class="pull-right">
                                    <button class="btn btn-xs btn-danger" onclick="window.location='/ordenes/{{ $user }}/delete/{{ $orden->id }}';">eliminar</button>
                                </span>
                            </li>
                        @endforeach
                    </div>
                    @if($errors->any())
                        <div class="row" >
                            <div class="col-md-12" style="color: red;">
                                <h4 class="text-center">{{$errors->first()}}</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
