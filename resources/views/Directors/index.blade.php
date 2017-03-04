@extends('layouts.defolt')
@section('content')
    <div class="row">
        @foreach ($directors as $row)
            <div class="oriented col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $row->S_Name !!} {!!  $row->L_Name !!}</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">Рік народження:{!! $row->Y_Birth !!}</li>
                            <li class="list-group-item">Рік смерті:{!! $row->Y_Death !!}</li>
                            <li class="list-group-item">Громадянство:{!! $row->countries !!}</li>
                            <li class="list-group-item">
                                <form method="post" action="{{route('directorsDelete',['id'=>$row->id])}}">
                                    <p>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" value="Видалити!"/>
                                    </p>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $directors->links() }}
    <div class="sidenav" align="center">
        <p><a href="/directors/add">
                <button>Додати режисера!!!</button>
            </a>
        </p>
    </div>
@endsection
