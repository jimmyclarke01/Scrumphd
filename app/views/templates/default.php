<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="UTF-8">
		<title>Website | {% block title %}{% endblock %}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- This is for Bootstrap CSS -->
		<link href="{{ config.app.url }}/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ config.app.url }}/public/layout/css/custom.css" rel="stylesheet">
		<script src="{{ config.app.url }}/vendor/twbs/bootstrap/dist/js/respond.min.js"></script>
		
	</head>
	<body>
	    <div class="container">
	        {% include 'templates/partials/messages.php' %} 
		    {% include 'templates/partials/navigation.php' %}
		    {% block content %}{% endblock %}
		</div>
		<!-- JQuery Loads -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="{{ config.app.url }}/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
		{% block script %}{% endblock %}
	</body>
</html>