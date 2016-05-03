{% extends 'email/templates/default.php' %}

{% block content %}
    <p>A new user has registered!</p>
	
	<p>Username: {{ user.username }}</p>
	
	<p>Email: {{ user.email }}</p>
{% endblock %}