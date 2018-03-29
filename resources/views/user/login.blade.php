<!DOCTYPE html>
<html>
<head>
	<title>Login | Investment System</title>
	<!--asset = path-->
	<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
	<!--google font-->
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>
<body>
	
	<!--image-->
	<div class="background"></div>

	<section id="content-view" class="login">

		<h1>Investment</h1>
		<h3>Well Done!</h3>

		{!! Form::open(['route' => 'user.login', 'method' => 'post']) !!} <!--start blade-->

		<p>Access Now</p>

		<!--username-->
		<label>
			{!! Form::text('username', null, ['class' => 'input', 'placeholder' => "Username"]) !!}
		</label>

		<!--password-->
		<label>
			{!! Form::password('password', ['placeholder' => "Password"]) !!}
		</label>

		<!--button submit-->
		{!! Form::submit('Submit') !!}

		{!! Form::close() !!} <!--close blade-->

	</section>

</body>
</html>
