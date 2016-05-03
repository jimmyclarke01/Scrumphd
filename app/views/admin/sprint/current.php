{%extends 'templates/default.php' %}

{% block title %}Current Sprint{% endblock %}

{% block content %}
<div class="container">
	<div class="row">
		<!--BACKLOG-->
		<div class="col-sm-12">
			<h2>Sprint</h2>
		</div>
	</div>
	<div class="container stories">
		{% if stories is empty %}
		<div class="row">
			<div class="col-sm-12">
				<p>No stories in the current sprint</p>
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
										<div {% if story.priority < 4 %} id="priority-low" {% elseif story.priority > 15 %} id="priority-high" {% else %} id="priority-medium" {% endif %} class="col-sm-6 priority">
											<h5><span class="glyphicon glyphicon-fire"></span> &nbsp{{ story.priority }}/25</h5>
										</div>
										<div class="col-sm-6 storypoints">
											<h5><span class="glyphicon glyphicon-star"></span> &nbsp{{ story.storypoints }}</h5>
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