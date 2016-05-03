{%extends 'templates/default.php' %}

{% block title %}Change Password{% endblock %}

{% block content %}
	<h2>Change Password</h2>
	<form role="form" action="{{ urlFor('password.change.post') }}" method="post" autocomplete="off">
		<div class="row">
		
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
			
				<div class="row">
					<div class="col-sm-12">
						<!--OLD PASSWORD-->
						<div class="form-group">
						<label for="password_old">Old Password:</label>
							<input type="password" class="form-control" name="password_old" id="password_old" placeholder="Old Password">
							{% if errors.has('password_old') %}<div class = "errors">{{ errors.first('password_old') }}</div>{% endif %}
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<!--NEW PASSWORD-->
						<div class="form-group">
							<label for="password">New Password:</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
							{% if errors.has('password') %}<div class = "errors">{{ errors.first('password') }}</div>{% endif %}
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<!--CONFIRM PASSWORD-->
						<div class="form-group">
							<label for="password_confirm">Confirm Password:</label>
							<input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
							{% if errors.has('password_confirm') %}<div class = "errors">{{ errors.first('password_confirm') }}</div>{% endif %}
						</div>
					</div>
				</div>
				
				<div class="row text-center">
					<!--SUBMIT-->
					<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
					<button type="submit" class="btn btn-default">Change Password</button>
				</div>
				
			</div>
		</div>
	</form>
{% endblock %}
