@extends('layouts.defolt')
@section('content')
    <div class="panel panel-default" align="center">
        <div class="panel-heading">
            <h1>Додати Студію:</h1>
        </div>
        <form method="post" action="{{route('studiostore')}}">
            <p>
                <label>Назва: </label><br>
                <input type="text" name="Name_studio"/>
            </p>
            <p>
                <label>Контакт:</label><br>
                <input type="text" name="Contact"/>
            </p>
            <p>
                <label>Краіна:</label><br>
                <select name="id_countries">
                    <option disabled>Виберіть Країну</option>
                    @foreach ($countries as $row)
                        <option value="{!! $row->id !!}">{!! $row->countries !!}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label>Місто:</label><br>
                <select name="id_town">
                    <option disabled>Виберіть Місто</option>
                    @foreach ($town as $row)
                        <option value="{!! $row->id !!}">{!! $row->town !!}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label>Вулиця:</label><br>
                <input type="text" name="street"/>
            </p>
            <p>
                <label>Індех:</label><br>
                <input type="text" name="_index"/>
            </p>
            <p>
                <input type="submit" value="Додати!"/>
                {{ csrf_field() }}
            </p>
        </form>
    </div>
@endsection