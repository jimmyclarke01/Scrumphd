{%extends 'templates/default.php' %}

{% block title %}Login{% endblock %}

{% block content %}
<div class="container">
	<h2>Login</h2>
	<p>Log in here to view the backlog, add product stories, and review past sprints.</p>
	<form role="form" action="{{ urlFor('login.post') }}" method="post" autocomplete="off">

		<!--IDENTIFIER-->
		<div class="form-group">
			<label for="email">Email/Username:</label>
			<input type="text" class="form-control" name="identifier" id="identifier">
			{% if errors.has('identifier') %}
			<div class = "errors">
				{{ errors.first('identifier') }}
			</div>
			{% endif %}
		</div>

		<!--PASSWORD-->
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password">
			{% if errors.has('password') %}
			<div class = "errors">
				{{ errors.first('password') }}
			</div>
			{% endif %}
		</div>

		<!--REMEMBER ME-->
		<div class="checkbox">
			<label><input type="checkbox" name="remember" id="remember">Remember me</label>
		</div>

		<!--SUBMIT-->
		<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
		<button type="submit" class="btn btn-default">Login</button>
	</form>

	<!--FORGOT PASSWORD-->
	<p><a href="{{ urlFor('password.recover') }}">Forgot your password?</a></p>
	
	<!--NOT REGISTERED-->
	<p>Not a registered user? <a href="{{ urlFor('register') }}">Register here.</a></p>
</div>
{% endblock %}
