<?php

$app->get('/admin/backlog/priority-ascending.php',  $admin(), function() use ($app) {
	
	$stories = $app->story->where('is_current', false)->where('is_done', false)->get()->sortBy('priority');
	
    $app->render('admin/backlog/all.php', [
		'stories' => $stories,
	]);
})->name('admin.backlog.priority-ascending');

