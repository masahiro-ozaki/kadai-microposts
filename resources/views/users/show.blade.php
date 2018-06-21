@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) . '&d=mm' }}" alt="">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
           
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_microposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/likes') ? 'active' : '' }}"><a href="{{ route('users.likes', ['id' => $user->id]) }}">Likes <span class="badge">{{ $count_likes }}</span></a></li>
            </ul>
            </ul>
            @if (Auth::id() == $user->id) <!-- Auth::user()->id wo Auth::id() ni kaetayo -->
                  {!! Form::open(['route' => 'microposts.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          <!--{!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}-->
                          {{ Form::button('<span class="glyphicon glyphicon-send"> Post</span>', array('class'=>'btn btn-primary btn-block', 'type'=>'submit')) }}
                      </div>
                  {!! Form::close() !!}
                  
            @endif
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
            
        </div>
    </div>
@endsection