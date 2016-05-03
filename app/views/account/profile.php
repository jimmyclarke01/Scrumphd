{%extends 'templates/default.php' %}

{% block title %}Update Profile{% endblock %}

{% block content %}
	<h2>Update Profile</h2>
	<form role="form" action="{{ urlFor('account.profile.post') }}" method="post" autocomplete="off">	
		<div class="row">
		
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<div class="row">
				
					<div class="col-sm-12">
						<!--EMAIL-->
						<div class="form-group">
							<label for="email">Email Address:</label>
							<input type="email" class="form-control" name="email" id="email" value="{{ request.post('email') ? request.post('email') : auth.email }}">
							{% if errors.has('email') %}<div class = "errors">{{ errors.first('email') }}</div>{% endif %}
						</div>
					</div>
					
				</div>
				<div class="row">
				
					<div class="col-sm-6">
						<!--FIRST NAME-->
						<div class="form-group">
							<label for="first_name">First Name:</label>
							<input type="text" class="form-control" name="first_name" id="first_name" value="{{ request.post('first_name') ? request.post('first_name') : auth.first_name }}">
							{% if errors.has('first_name') %}<div class = "errors">{{ errors.first('first_name') }}</div>{% endif %}
						</div>
					</div>
					
					<div class="col-sm-6">
						<!--LAST NAME-->
						<div class="form-group">
							<label for="last_name">Last Name:</label>
							<input type="text" class="form-control" name="last_name" id="last_name" value="{{ request.post('last_name') ? request.post('last_name') : auth.last_name }}">
							{% if errors.has('last_name') %}<div class = "errors">{{ errors.first('last_name') }}</div>{% endif %}
						</div>
					</div>
					
				</div>
				
				<div class="row text-center">
					<!--SUBMIT-->
					<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
					<button type="submit" class="btn btn-default text-center">Add Story</button>
				</div>
				
			</div>
			
		</div>
	</form>
{% endblock %}
