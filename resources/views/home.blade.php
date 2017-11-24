@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body" >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center">Usuarios</h4>

                    <div class="list-group">
                        @foreach ($usuarios as $user)
                            <a href="/ordenes/{{ $user['nombre'] }}" class="list-group-item list-group-item-action">
                                {{ $user['nombre'] }}

                                @if ($user['errores'] > 0)
                                <span class="badge badge-error">{{ $user['errores'] }}</span>
                                @endif

                                @if ($user['pendingOrders'] > 0)
                                <span class="badge badge-warning">{{ $user['pendingOrders'] }}</span>
                                @endif

                                <span class="badge badge-info">{{ $user['cantOrdenes'] }}</span>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
