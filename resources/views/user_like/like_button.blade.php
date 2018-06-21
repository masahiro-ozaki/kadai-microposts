
    @if (Auth::user()->is_liking($micropost->id))
        {!! Form::open(['route' => ['user.unlike', $micropost->id], 'method' => 'delete']) !!}
            <!--{!! Form::submit('Unlike', ['class' => "btn btn-default btn-xs"]) !!}-->
            {{ Form::button('<span class="glyphicon glyphicon-thumbs-down"></span>', array('class'=>'btn btn-default btn-xs pull-left', 'type'=>'submit')) }}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.like', $micropost->id], 'method' => 'post']) !!}
            <!--{!! Form::submit('Like', ['class' => "btn btn-success btn-xs"]) !!}-->
            {{ Form::button('<span class="glyphicon glyphicon-thumbs-up"></span>', array('class'=>'btn btn-success btn-xs pull-left', 'type'=>'submit')) }}
        {!! Form::close() !!}
    @endif
