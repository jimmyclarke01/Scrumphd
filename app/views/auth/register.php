{%extends 'templates/default.php' %}

{% block title %}Register{% endblock %}

{% block content %}
<div class="container">
	<h2>Register</h2>
	<p>Please register here to have access to my Scrumphd project management site. All passwords are hashed securely, and are only required to prevent unauthorised access to sensitive data and intellectual property. </p>
	<form role="form" action="{{ urlFor('register.post') }}" method="post" autocomplete="off">

		<!--EMAIL-->
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" class="form-control" name="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"  {% endif %}>
			{% if errors.has('email') %}<div class = "errors">{{ errors.first('email') }}</div>{% endif %}
		</div>

		<!--USERNAME-->
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" name="username" id="username"{% if request.post('username') %} value="{{ request.post('username') }}"  {% endif %}>
			{% if errors.has('username') %}<div class = "errors">{{ errors.first('username') }}</div>{% endif %}
		</div>
		
		<!--PASSWORD-->
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password">
			{% if errors.has('password') %}<div class = "errors">{{ errors.first('password') }}</div>{% endif %}
		</div>

		<!--CONFIRM PASSWORD-->
		<div class="form-group">
			<label for="password_confirm">Confirm Password:</label>
			<input type="password" class="form-control" name="password_confirm" id="password_confirm">
			{% if errors.has('password_confirm') %}<div class = "errors">{{ errors.first('password_confirm') }}</div>{% endif %}
		</div>

		<!--SUBMIT-->
		<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
{% endblock %}
