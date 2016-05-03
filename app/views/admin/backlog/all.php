{%extends 'templates/default.php' %}

{% block title %}Backlog{% endblock %}

{% block content %}
<div class="container">
	<div class="row">
		<!--BACKLOG-->
		<div class="col-sm-12">
			<h2>Backlog</h2>
		</div>
	</div>
	
	<div class="row">
	
	
	<!--SORT-->
		<div class="col-sm-2">
			<div class="panel-group">
				<div class="panel panel-default sort-collapsible">
					<a data-toggle="collapse" href="#collapse1">
						<div class="panel-heading">
							<h4 class="panel-title">
								Sort by <span class="caret"></span>
							</h4>
						</div>
					</a>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<a href="{{ urlFor('admin.backlog.priority-descending') }}">
								<span class="glyphicon glyphicon-arrow-down"></span>
							</a>
							
							<a href="{{ urlFor('admin.backlog.priority-ascending') }}">
								<span class="glyphicon glyphicon-arrow-up"></span>
							</a> &nbsp&nbspPriority
						</div>
						<div class="panel-body">
							<a href="{{ urlFor('admin.backlog.storypoints-descending') }}">
								<span class="glyphicon glyphicon-arrow-down"></span>
							</a> 
							
							<a href="{{ urlFor('admin.backlog.storypoints-ascending') }}">
								<span class="glyphicon glyphicon-arrow-up"></span>
							</a> &nbsp&nbspStorypoints
						</div>
						<div class="panel-body">
							&nbsp
							<a href="{{ urlFor('admin.backlog.random') }}">
								<span class="glyphicon glyphicon-random"></span>
							</a>&nbsp&nbsp&nbsp&nbspRandom
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--STORIES-->
	<div class="container stories">
		{% if stories is empty %}
		<div class="row">
			<div class="col-sm-12">
				<p>No stories in the backlog</p>
			</div>
		</div>
		{% else %}
			{% for story in stories %}
				{% if loop.index % 3 == 0 %}
					<div class="row">
				{% endif %}
							<div class="col-sm-4">
								<div class="col-sm-12 story-boxes">
									<div class="row">
										<div id="story" class="col-sm-12">
											<h4>{{ story.getStory }}</h4>
										</div>
									</div>
									
									<div class="row">
										<div id="def-of-done" class="col-sm-12">
											<h5>Complete when {{ story.def_of_done }}</h5>
										</div>
									</div>
									<div class="row">
										<div {% if story.priority < 4 %} id="priority-low" {% elseif story.priority > 15 %} id="priority-high" {% else %} id="priority-medium" {% endif %} class="col-sm-4 priority">
											<h5><span class="glyphicon glyphicon-fire"></span> &nbsp{{ story.priority }}/25</h5>
										</div>
										<div class="col-sm-4 storypoints">
											<h5><span class="glyphicon glyphicon-star"></span> &nbsp{{ story.storypoints }}</h5>
										</div>
										<div class="col-sm-4">
											<h5><a href="{{ urlFor('admin.story.edit', {id: story.id}) }}"><span class="glyphicon glyphicon-edit"></span> &nbspEdit</a></h5>
										</div>
									</div>
									<div class="row">
										<div id="added-on" class="col-sm-12">
											<p>Added {{ story.created_at }}</p>
										</div>
									</div>
								</div>
							</div>
				{% if loop.index % 3 == 0 %}
					</div>
					<br>
				{% endif %}	
			{% endfor %}
		{% endif %}
	</div>
</div>
{% endblock %}