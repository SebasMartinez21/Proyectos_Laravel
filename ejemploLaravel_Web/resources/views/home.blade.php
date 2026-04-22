@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

            </div>

            <br>
            <h1>Grafica con petición a una API y la ayuda de Plotly</h1>
            <div name="grafica" id="grafica"></div>

            <button type="button" onclick="api()">Graficar</button>

            <script src="{{asset('js/grafica.js')}}"></script>
        </div>
    </div>
</div>
@endsection
