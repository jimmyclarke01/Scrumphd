<?php

$app->get('/admin/sprint/current.php', $admin(), function() use ($app) {
	
	$stories = $app->story->where('is_current', true)->get();
	
	$app->render('admin/sprint/current.php', [
		'stories' => $stories
	]);
	
})->name('admin.sprint.current');
