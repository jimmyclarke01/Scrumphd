{%extends 'templates/default.php' %}

{% block title %}Edit Story{% endblock %}
{% block content %}
<div class="container">
	<h2>Edit Story</h2>
	<form role="form" action="{{ urlFor('admin.story.edit.post') }}" method="post" autocomplete="off">
	<div class="row">
	<div class="col-sm-2"></div>
		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-12">
					<!--AS A...-->
					<div class="form-group">
						<label for="story1">As a...</label>
						<input type="text" class="form-control" name="story1" value="{{ request.post('story1') ? request.post('story1') : story.story1 }}">
						{% if errors.has('story1') %}<div class = "errors">{{ errors.first('story1') }}</div>{% endif %}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<!--..IT NEEDS TO BE POSSIBLE TO...-->
					<div class="form-group">
						<label for="story2">...it needs to be possible to...</label>
						<textarea class="form-control" rows="2" name="story2" id="story2">{{ request.post('story2') ? request.post('story2') : story.story2 }}</textarea>
						{% if errors.has('story2') %}<div class = "errors">{{ errors.first('story2') }}</div>{% endif %}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<!--...SO THAT...-->
					<div class="form-group">
						<label for="story3">...so that...</label>
						<textarea class="form-control" rows="2" name="story3" id="story3">{{ request.post('story3') ? request.post('story3') : story.story3 }}</textarea>
						{% if errors.has('story3') %}<div class = "errors">{{ errors.first('story3') }}</div>{% endif %}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<!--STORYPOINTS-->
					<div class="form-group">
						<label for="storypoints">Storypoints:</label>
						<input type="number" class="form-control" name="storypoints" id="storypoints" placeholder="1, 2, 3, 5, 8, 13, 20, 40, 100" value="{{ request.post('storypoints') ? request.post('storypoints') : story.storypoints }}">
						{% if errors.has('storypoints') %}{{ errors.first('storypoints') }}{% endif %}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<!--DEFINITION OF DONE-->
					<div class="form-group">
						<label for="def_of_done">Definition of done:</label>
						<textarea class="form-control" rows="2" name="def_of_done" id="def_of_done">{{ request.post('def_of_done') ? request.post('def_of_done') : story.def_of_done }}</textarea>
						{% if errors.has('def_of_done') %}{{ errors.first('def_of_done') }}{% endif %}
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-12">
					<!--VALUE-->
					<div class="form-group">
						<label for="value">Value:</label>
						<input type="range" class="form-control" name="value" id="value" value="{{ request.post('value') ? request.post('value') : story.value }}" min="1" max="5">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" id="value-text">
					<ul class="list-group">
						<li class="list-group-item" id="value-text-1"></li>
						<li class="list-group-item" id="value-text-2"></li>
						<li class="list-group-item" id="value-text-3"></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<!--URGENCY-->
					<div class="form-group">
						<label for="urgency">Urgency:</label>
						<input type="range" class="form-control" name="urgency" id="urgency" value="{{ request.post('urgency') ? request.post('urgency') : story.urgency }}" min="1" max="5">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<ul class="list-group">
						<li class="list-group-item" id="urgency-text-1"></li>
						<li class="list-group-item" id="urgency-text-2"></li>
						<li class="list-group-item" id="urgency-text-3"></li>
					</ul>
				</div>
			</div>			
		</div>
		
		<div class="col-sm-2"></div>
		
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4 text-center">
					<input type="hidden" name="id" id="id" value="{{ story.id }}">
					<!--SUBMIT-->
					<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
					<button type="submit" class="btn btn-default text-center">Edit Story</button>
				</div>
			<div>
		</div>
	
		
	</form>
</div>
{% endblock %}
{% block script %}<script type="text/javascript" src="{{ config.app.url }}/scrumphd/public/layout/js/custom.js"></script>{% endblock %}
