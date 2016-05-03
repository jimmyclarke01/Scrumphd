{%extends 'templates/default.php' %}

{% block title %}Create Sprint{% endblock %}

{% block content %}
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Create Sprint</h2>
		</div>
	</div>
	
	<form role="form" action="{{ urlFor('admin.sprint.create.post') }}" method="post" autocomplete="off">
		{% if stories is empty %}
			<div class="row">
				<div class="col-sm-12">
					<p>No stories in the backlog</p>
				</div>
			</div>
		{% else %}
			<div class="form-group">
				{% for story in stories %}
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="{{ story.id }}" id="{{ story.id}}">
										<dl>
											<dt>{{ story.getStory }}</dt>
											<dd>{{ story.def_of_done }}</dd>									
										</dl>
								</label>
							</div>
						</div>
						
						<div class="col-sm-4">
							<div {% if story.priority < 4 %} id="priority-low" {% elseif story.priority > 15 %} id="priority-high" {% else %} id="priority-medium" {% endif %} class="col-sm-2 priority">
								<h5><span class="glyphicon glyphicon-fire"></span> &nbsp{{ story.priority }}/25</h5>
							</div>
							<div class="col-sm-2 storypoints">
								<h5><span class="glyphicon glyphicon-star"></span> &nbsp{{ story.storypoints }}</h5>
							</div>
						</div>
					</div>
				{% endfor %}
			</div>
		{% endif %}
		
			<div class="row">
				<input type="hidden" name="stories" value=" {{ stories }}">
				
				<!--SUBMIT-->
				<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
				<button type="submit" onclick="return confirm('Are you sure you want to create this sprint?')" class="btn btn-default">Create Sprint</button>
			</div>
	</form>
</div>
{% endblock %}