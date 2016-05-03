{%extends 'templates/default.php' %}

{% block title %}Finish Sprint{% endblock %}

{% block content %}
<div class="container">
	<h2>Finish Sprint</h2>	
	
	<form role="form" action="{{ urlFor('admin.sprint.finish.post') }}" method="post" autocomplete="off">
	
		<div class="row">
			<div class="col-sm-2"></div>
		
			<div class="col-sm-8">
			
				
					{% if stories is empty %}
						<p>No stories in this sprint</p>
					{% else %}
					<div class="row">
						<div class="form-group">
							{% for story in stories %}
								<div class="checkbox">
									<label><input type="checkbox" name="{{ story.id }}" id="{{ story.id}}">{{ story.def_of_done }}</label>
								</div>
							{% endfor %}
						</div>
					</div>
					{% endif %}
				
				
				<div class="row">
						<input type="hidden" name="stories" value=" {{ stories }}">
						
						<!--SUBMIT-->
						<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
						<button type="submit" onclick="return confirm('Are you sure you want to finish this sprint?')" class="btn btn-default">Finish Sprint</button>
				</div>
			</div>
			
		</div>
	</form>
	
</div>
{% endblock %}