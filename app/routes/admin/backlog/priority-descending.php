<?php

$app->get('/admin/backlog/priority-descending.php',  $admin(), function() use ($app) {
	
	$stories = $app->story->where('is_current', false)->where('is_done', false)->get()->sortByDesc('priority');
	
    $app->render('admin/backlog/all.php', [
		'stories' => $stories,
	]);
})->name('admin.backlog.priority-descending');

