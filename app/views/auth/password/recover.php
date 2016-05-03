{%extends 'templates/default.php' %}

{% block title %}Recover Password{% endblock %}

{% block content %}
<div class="container">
	<h2>Recover Password</h2>
	<p>Enter your email address to start your password recovery</p>
    
	<form role="form" action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">

		<!--EMAIL-->
	    <div class="form-group">
	        <input type="email" class="form-control" name="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"  {% endif %}>
	        {% if errors.has('email') %}<div class = "errors">{{ errors.first('email') }}</div>{% endif %}
	    </div>

		<!--SUBMIT-->
	    <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
{% endblock %}
