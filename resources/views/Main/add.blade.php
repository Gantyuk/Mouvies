@extends('layouts.defolt')
@section('content')
    <div class="panel panel-default" align="center">
        <div class="panel-heading">
            <h2>Додати фільм:</h2>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{route('muvistore')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id_directors" class="col-md-3 control-label">Режисер:</label>
                    <select class="col-md-4 " name="id_directors">
                        <option disabled>Виберіть Режисера</option>
                        @foreach ($directors as $row)
                            <option value="{!! $row->id !!}">{!! $row->L_Name !!}</option>
                        @endforeach
                    </select>
                </div><br><br>
                <p>
                    <label class="col-md-4 control-label" >Назва:</label>
                    <input class="col-md-4 control-label" type="text" name="Name"/>
                </p>
                <p>
                    <label>Жанр:<br></label><br>
                    <select name="id_genres">
                        <option disabled>Виберіть жанр</option>
                        @foreach ($genres as $row)
                            <option value="{!! $row->id !!} ">{!! $row->genres !!}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Тривальсть:</label><br>
                    <input type="text" name="Duration"/>
                </p>
                <p>
                    <label>Рік:</label><br>
                    <input type="text" name="year"/>
                </p>
                <p>
                    <label>Бюджет:</label><br>
                    <input type="text" name="Biudjet"/>
                </p>
                <p>
                    <label>Студія:</label><br>
                    <select name="id_Studio">
                        <option disabled>Виберіть студію</option>
                        @foreach ($studio as $row)
                            <option value="{!! $row->id !!}">{!! $row->Name_studio !!}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Дата: </label><br>
                    <input type="date" name="Date"/>
                </p>
                <p>
                    <label>Зображення: </label>
                    <input type="file" name="images" accept="image/*">
                </p>
                <p>
                    <label>Опис:</label><br>
                    <textarea name="discription"></textarea>
                </p>
                <p>
                    <input type="submit" value="Додати!"/>
                    {{ csrf_field() }}
                </p>
            </form>
        </div>
    </div>
@endsection
