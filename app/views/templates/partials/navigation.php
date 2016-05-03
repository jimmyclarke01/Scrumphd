<nav class="navbar navbar-default lightred-txt">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" id="myNavbarBrand" href="{{ urlFor('home') }}"><span class="glyphicon glyphicon-book"></span> <span class="tealblue-txt">Scrum</span>phd</a>
		</div>
		{% if auth %}
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
				
					<!--ACCOUNT-->
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="lightred-txt" href="{{ urlFor('user.profile', {username: auth.username}) }}">View Profile</a></li>
							<li><a href="{{ urlFor('account.profile') }}">Update Details</a></li>
							<li><a href="{{ urlFor('password.change') }}">Change Password</a></li>
							<li><a href="{{ urlFor('user.all') }}">All Users</a></li>
						</ul>
					</li>
					
					<!--BACKLOG-->
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Backlog <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ urlFor('admin.backlog.priority-descending') }}">View Backlog</a>
							{% if auth.isAdmin %}
								<li><a href="{{ urlFor('admin.story.add') }}">Add Story</a></li>
							{% endif %}
						</ul>
					</li>
					
					<!--SPRINT-->
					{% if auth.isMe %}
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sprint <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ urlFor('admin.sprint.current') }}">View</a>
								<li><a href="{{ urlFor('admin.sprint.create') }}">Create</a></li>
								<li><a href="{{ urlFor('admin.sprint.finish') }}">Finish</a></li>
							</ul>
						</li>
					{% else %}
						<li><a href="{{ urlFor('admin.sprint.current') }}">Sprint</a></li>
					{% endif %}
						
					
					<!--HISTORY-->
					<li><a href="{{ urlFor('admin.history.all') }}">History</a></li>
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ urlFor('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
		{% else %}
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ urlFor('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					<li><a href="{{ urlFor('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
		{% endif %}
			</div>
	</div>
</nav>