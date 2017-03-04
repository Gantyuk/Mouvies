@extends('layouts.defolt')
@section('content')
    <form method="post" action="{{route('muvisearch')}}">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <label>Пошук за студією:<br></label>
            </div>
            <div class="panel-body" align="center">
                <select name="studion">
                    <option disabled>Виберіть студію</option>
                    @foreach ($studio as $row)
                        <option value="{!! $row->id !!}">{!! $row->Name_studio !!}</option>
                    @endforeach
                </select>
                <input type="submit" value="Пошук"/>
            </div>
            {{ csrf_field() }}
        </div>
    </form>
    <form method="post" action="{{route('muvisearch')}}">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <label>Пошук за режисером:<br></label>
            </div>
            <div class="panel-body" align="center">
                <select name="directors">
                    <option disabled>Виберіть Режисера</option>
                    @foreach ($directors as $row)
                        <option value="{!! $row->id  !!}">{!! $row->L_Name !!}</option>
                    @endforeach
                </select>
                <input type="submit" value="Пошук"/>
                <br/>
            </div>
            {{ csrf_field() }}
        </div>
    </form>
    <form method="post" action="{{route('muvisearch')}}">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <label>Пошук по частині :<br></label>
            </div>
            <div class="panel-body" align="center">
                <input type="text" name="search_str"/>
                <button name="search" value="m.Name">Пошук!</button>
            </div>
            {{ csrf_field() }}
        </div>
    </form>
    @if (isset($movies) && !empty($movies))
        @foreach ($movies as $row)
            @include('Main.panel-mouvi');
        @endforeach
    @endif
@endsection