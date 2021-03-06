<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) . '&d=mm' }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                @include('user_like.like_button', ['user' => $user])
                
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        <!--{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}-->
                        {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class'=>'btn btn-danger btn-xs', 'type'=>'submit')) }}
                    {!! Form::close() !!}
                @endif
                
                
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}