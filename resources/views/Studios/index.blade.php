@extends('layouts.defolt')
@section('content')
    <div class="row">
        @foreach ($studios as $row)
            <div class="oriented col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $row->Name_studio !!}</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Адреса: {!! $row->countries . ' ' . $row->town . ' ' . $row->street . ' ' . $row->_index !!}</li>
                            <li class="list-group-item">Контакт:{!!  $row->Contact !!}</li>
                            <li class="list-group-item">
                                <form method="post" action="{{route('studiosDelete',['id'=>$row->id])}}">
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
    {{ $studios->links() }}
    <div class="sidenav" align="center">
        <p><a href="/studios/add">
                <button>Додати Студію!!!</button>
            </a>
        </p>
    </div>
@endsection