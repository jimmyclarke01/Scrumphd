<?php

$app->get('/sprints', $admin(), function() use ($app) {
	
	$sprints = $app->sprint->get()->sortBy('sprint_id');
	
	foreach ($sprints as $sprint) {
		$sprint->formatted_sprint_date = date("F d, Y", strtotime($sprint->sprint_date));
	}
	
    $app->render('admin/history/all.php', [
		'sprints' => $sprints
	]);
})->name('admin.history.all');

