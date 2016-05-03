{%extends 'templates/default.php' %}

{% block title %}History{% endblock %}

{% block script %}<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('date','Date');
	data.addColumn('number', 'Storypoints');
	{% for sprint in sprints %}
		data.addRow([new Date('{{ sprint.sprint_date }}'), {{ sprint.storypoints_completed }}]);
	{% endfor %}
	var options = {
		legend: 'none',
		series: {
			0: { color: '#3c948b' },
		},
		gridlines: {
			units: {
			months: {format: ['MMM yyyy']},
			}
		},
		vAxis: { title: 'Storypoints' },
	};
	function resize () {
		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
		chart.draw(data, options);
	}
	window.onload = resize();
	window.onresize = resize;
}
</script>
{% endblock %}

{% block content %}
<div class="container">
	<h2>History</h2>
		{% if sprints is empty %}
			<div class="row">
				<div class="col-sm-12">
					<p>No completed sprints</p>
				</div>
			</div>
		{% else %}
			<div class="row">
				<div class="col-sm-12">
						<div id="curve_chart"></div>
				</div>
			</div>
			
			<div class="row">
				<p></p>
			</div>
			{% for sprint in sprints %}
				{% if loop.index % 6 == 0 %}
				<div class="row">
				{% endif %}
					<a id="sprint" href="{{ urlFor('admin.history.sprint', {sprint_date: sprint.sprint_date}) }}">
						<div class="col-sm-2">
							<div class="col-sm-12">
								<div class="row text-center">
									<div class="col-sm-12" id="date">
										<h5>{{ sprint.formatted_sprint_date }}</h5>
									</div>
								</div>
								
								<div class="row text-center">
									<div id="def-of-done" class="col-sm-12">
										<p><span class="glyphicon glyphicon-star"></span> {{ sprint.storypoints_completed }}</p>
									</div>
								</div>
							</div>
						</div>
					</a>
				{% if loop.index % 6 == 0 %}
				</div>
				<br>
				{% endif %}
			{% endfor %}
		{% endif %}
	</div>
{% endblock %}