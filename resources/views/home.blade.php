@extends('layouts.defolt')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" align="center">Вітаємо на саіті!!</div>
        <div class="panel-body">
            Ви ввійшли під своім акаунтом : {{ Auth::user()->name }}
        </div>
    </div>
@endsection
