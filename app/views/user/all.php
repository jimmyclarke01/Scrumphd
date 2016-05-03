{%extends 'templates/default.php' %}

{% block title %}All Users{% endblock %}

{% block content %}
    <h2>All Users</h2>
    
	<div class="row">
		<div class="col-sm-12">
			{% if users is empty %}
				<p>No active users.</p>
			{% else %}
				{% for user in users %}
					<div class="row">
						<div class="col-sm-12">
							<a href="{{ urlFor('user.profile', {username: user.username}) }}">
								{% if user.getFullName %}
									{{ user.getFullName }}
								{% else %}
									{{ user.username }}
								{% endif %}
							</a>
							{% if user.isMe %}
								(Student)
							{% elseif user.isAdmin %}
								(Supervisor)
							{% endif %}
						</div>
					</div>
				{% endfor %}
			{% endif %}
		</div>
	</div>
    
{% endblock %}
