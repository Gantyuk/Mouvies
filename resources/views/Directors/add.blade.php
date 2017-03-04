@extends('layouts.defolt')
@section('content')
    <div class="panel panel-default" align="center">
        <div class="panel-heading">
            <h1>Додати Режисера:</h1>
        </div>
        <div class="panel-body">
            <form method="post" action="">
                <p>
                    <label> Ім'я: </label><br>
                    <input type="text" name="L_Name"/>
                <p>
                    <label> Прізвище:</label> <br>
                    <input type="text" name="S_Name"/>
                </p>
                <p>
                    <label> Рік народження:</label><br>
                    <input type="text" name="Y_Birth"/>
                </p>
                <p>
                    <label>Рік смерті:</label><br>
                    <input type="text" name="Y_Death"/>
                </p>
                <p>
                    <label>Громадянство:</label><br>
                    <select name="id_contries">
                        <option disabled>Виберіть Країну</option>
                        @foreach ($countries as $row)
                            <option value="{!! $row->id !!}">{!! $row->countries !!}</option>
                        @endforeach
                    </select>
                </p>
                <input type="submit" value="Додати!"/>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection