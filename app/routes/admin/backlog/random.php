
<?php

$app->get('/admin/backlog/random.php',  $admin(), function() use ($app) {
	
	$stories = $app->story->where('is_current', false)->where('is_done', false)->orderByRaw("RAND()")->get();

    $app->render('admin/backlog/all.php', [
		'stories' => $stories,
	]);
})->name('admin.backlog.random');

