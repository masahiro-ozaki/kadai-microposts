@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else
   <!--     <div class="col-xs-12 cover-img" style="background-image:url('image/gatag-00003069.jpg');">-->
			<!--<div class="cover-text text-center">-->
			<!--	<p style="color: #ff;">ここがテキストですよ！！</p>-->
			<!--</div>-->
		
		<link href="css/sample.css" rel="stylesheet" type="text/css">
		
		<div class="cover-text text-center">
			<h1><p style="color: #fff;"><br><br><br><br><br><br><span style="font : normal 900 80pt 'Monotype Corsiva'">Welcome to the Microposts</span></p></h1><br>
			{!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-info']) !!}
		</div>
		
		
		<!--<div class="center jumbotron">-->
  <!--          <div class="text-center">-->
  <!--              <h1>Welcome to the Microposts</h1>-->
                
        <!--    </div>-->
        <!--</div>-->
		
		<!--</div>-->
    
        
        
    @endif
@endsection