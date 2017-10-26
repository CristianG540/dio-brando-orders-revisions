@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info" href="{{ url()->previous() }}" role="button">Regresar</a>
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Orden</div>

                <div class="panel-body" >

                    <div class="row text-center">
                        <div class="col-md-4">
                            <b>Codigo:</b> {{ $orden->_id }}
                        </div>
                        <div class="col-md-4">
                            <b>Codigo SAP:</b> {{ isset($orden->docEntry) ? $orden->docEntry : "" }}
                        </div>
                        <div class="col-md-4">
                            <b>Cliente: </b> {{ $orden->nitCliente }}
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <b>Observaciones:</b> {{ $orden->observaciones }}
                        </div>
                    </div>
                    @isset($orden->error)
                    <div class="row text-center">
                        <div class="col-md-12" style="color: red;">
                            <b>Error:</b> {{ $orden->error }}
                        </div>
                    </div>
                    @endisset
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <table class="table table-striped table table-bordered table-sm">
                                <thead class="thead-dark"></thead>
                                    <tr>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orden->items as $item)
                                    <tr>
                                        <td>{{ $item->_id }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row text-center">
                        <a class="btn btn-danger" href="/ordenes/{{ $user }}/delete/{{ $orden->_id }}" role="button">Eliminar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection