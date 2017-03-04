<div class="panel panel-default">
    <div class="panel-heading">{!! $row->Name !!}</div>
    <div class="panel-body">
        <img src="/images/muvies/{!! $row->images !!}" align="left" width="358" >
        <div class="image_muvi">
            <ul class="list-group">
                <li class="list-group-item">Режисер: {!! $row->S_Name . ' '. $row->L_Name !!}</li>
                <li class="list-group-item">Жанр:{!!  $row->genres !!}</li>
                <li class="list-group-item">Тривальсть:{!! $row->Duration !!}</li>
                <li class="list-group-item">Рік:{!! $row->year !!}</li>
                <li class="list-group-item">Бюджет:{!! $row->Biudjet !!}</li>
                <li class="list-group-item">Студія:{!! $row->Name_studio !!}</li>
                <li class="list-group-item">Число:{!! $row->Date !!}</li>
                <li class="list-group-item">Опис:<p>{!! $row->discription !!}</p></li>
                <li class="list-group-item">
                    <form method="post" action="{{route('muviDelete',['id'=>$row->id])}}">
                        <p>
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Видалити!" class="btn btn-primary"/>
                        </p>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>