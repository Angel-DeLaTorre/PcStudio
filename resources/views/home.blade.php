@extends('layouts.adminDashboard')
<!--Contenido del dashboard-->
<!--Hacer el extend del adminDashboard para activar todas las opciones dependiendo del rol-->
@section('module_name')
    <h1 style="color: white;" id="module_text">


        {{ $saludo }}
        <span style="color: #9ff4ff">
            <b>
                {{ Auth::user()->name }}
            </b>
        </span>
    </h1>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Nos alegra verte') }}
                    <span class="mb-0 text-sm  font-weight-bold"></span>

                </div>
            </div>

        </div>
    </div>
@endsection
