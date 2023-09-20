<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>

<body>
	<h1>Create Notebook Account</h1>

	<form action="signup_new_user" method="post">
		@csrf

		@if(Session::has('signup_message_error'))
			<div class="sign_up_error">
				<p>{!! session('signup_message_error')!!}</p>
			</div>
		@endif

		<div>
			<label for="username">Username</label>
			<input type="test" id="username" name="username">
		</div>
	
		<div>
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
		</div>

		<div>
			<label for="password_repeat">Password Repeat</label>
			<input type="password" id="password_repeat" name="password_repeat">
		</div>

		<div>
			<button type="submit" name="signup_button" id="signup_button">Sign up</button><br><br><br>
		</div>
	</form>

<form action = "login_page" method="POST">
	@csrf
	<button type="submit">Go Back</button>
</form>

</body>

</html>