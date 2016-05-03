{%extends 'templates/default.php' %}

{% block title %}Reset Password{% endblock %}

{% block content %}
<div class="container">
	<h2>Reset Password</h2>
	<form action="{{ urlFor('password.reset.post') }}?email={{ email }}&identifier={{ identifier|url_encode }}" method="post" autocomplete="off">

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
