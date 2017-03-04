@extends('layouts.defolt')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <form method="post" action="{{route('muviorder')}}">
                {{ csrf_field() }}
                <button name="sort" value="Name">Сортувати за ім'ям</button>
                <button name="sort" value="year">Сортувати за роком</button>
                <button name="sort" value="Biudjet">Сортувати за бюджетом</button>
            </form>
        </div>
    </div>
    @foreach ($movies as $row)
        @include('Main.panel-mouvi');
    @endforeach
    {{ $movies->links() }}
    <div class="sidenav" align="center">
        <p><a href="/main/add">
                <button>Додати фільм!!!</button>
            </a>
        </p>
    </div>
@endsection
