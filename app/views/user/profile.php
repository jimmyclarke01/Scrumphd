{%extends 'templates/default.php' %}

{% block title %}{{ user.getFullNameOrUsername }}{% endblock %}

{% block content %}
	<h2>
		{% if user.getFullName %}
			{{ user.getFullName }}
		{% else %}
			{{ user.username }}
		{% endif %}
	</h2>

	<div class="row">
		<div class="col-sm-2">
			<img src="{{ user.getAvatarUrl({size: 100}) }}" alt="Profile picture for {{ user.getFullNameOrUsername }}">
		</div>

		<div class="col-sm-4">
			<div class="row">
			<dl>
				{% if user.getFullName %}
					<dt>Full name:</dt>
					<dd>{{ user.getFullName }}</dd>
				{% endif %}
			</dl>
			</div>
			
			<div class="row">
			<dl>
				<dt>Email:</dt>
				<dd>{{ user.email }}</dd>
			</dl>
			</div>
			
		</div>
	</div>	
{% endblock %}
