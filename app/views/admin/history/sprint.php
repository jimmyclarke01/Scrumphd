{%extends 'templates/default.php' %}

{% block title %}Sprint {{ sprint.sprint_date }}{% endblock %}

{% block content %}
<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<h4><span class="glyphicon glyphicon-check"></span> Completed on {{ sprint.formatted_sprint_date }}</h4>
		</div>
		{% if sprint.box %}
		<div class="col-sm-2 sprint text-right">
			<h5><a href="{{ sprint.box }}">View Code <span class="glyphicon glyphicon-link"></span></a></h5>
			<h5><a href="#" data-toggle="collapse" data-target="#update-link">Edit Link <span class="glyphicon glyphicon-edit"></span></a></h5>
		</div>
		{% else %}
		<div class="col-sm-2 sprint text-right">
			<h5><a href="#" data-toggle="collapse" data-target="#update-link">Add Link <span class="glyphicon glyphicon-edit"></span></a></h5>
		</div>
		{% endif %}
	</div>
	<div class="row"><p></p></div>
	
	<div class="row collapse" id="update-link">
		<div class="col-sm-8"></div>
		<div class="col-sm-4 text-right">
			<form role="form" action="{{ urlFor('admin.history.sprint.post') }}" method="post" autocomplete="off">
				<!--UPDATE LINK-->
				<div class="form-group">
					<input type="url" class="form-control" name="box"  id="box" value="{{ request.post('box') ? request.post('box') : sprint.box }}">
					{% if errors.has('box') %}{{ errors.first('box') }}{% endif %}
				</div>
				
				<input type="hidden" name="id" value=" {{ sprint.id }}">
				<input type="hidden" name="url" value="{{ urlFor('admin.history.sprint', {sprint_date: sprint.sprint_date}) }}">
				
				
				<!--SUBMIT-->
				<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
				<button type="submit" class="btn btn-default">Update Link</button>

			</form>
		</div>
	</div>

	{% if stories is empty %}
	<div class="row">
		<div class="col-sm-12">
			<p>No stories were completed during this sprint</p>
		</div>
	</div>
    {% else %}
	<div class="row">
		<div class="col-sm-12">
			{% for story in stories %}
				<div class="row">
					<div class="col-sm-9">
						<dl>
							<dt>{{ story.getStory }}</dt>
							<dd>{{ story.def_of_done }}</dd>									
						</dl>
					</div>
					<div class="col-sm-3">
						<div {% if story.priority < 4 %} id="priority-low" {% elseif story.priority > 15 %} id="priority-high" {% else %} id="priority-medium" {% endif %} class="col-sm-6 priority">
							<h5><span class="glyphicon glyphicon-fire"></span> &nbsp{{ story.priority }}/25</h5>
						</div>
						<div class="col-sm-6 storypoints">
							<h5><span class="glyphicon glyphicon-star"></span> &nbsp{{ story.storypoints }}</h5>
						</div>
					</div>
				</div>
			{% endfor %}
    {% endif %}
{% endblock %}
