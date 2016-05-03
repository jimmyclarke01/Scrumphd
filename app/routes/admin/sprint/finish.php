<?php

use Carbon\Carbon;

use PhD\Sprint\Sprint;

$app->get('/admin/sprint/finish.php', $me(), function() use ($app) {
	
	$stories = $app->story->where('is_current', true)->get();
	
	$current = $app->story->where('is_current', true)->first();
	
	if (!$current) {
		$app->flash('global', 'You must first create a sprint.');
		return $app->response->redirect($app->urlFor('admin.sprint.create'));
	};
	
	$app->render('admin/sprint/finish.php', [
		'stories' => $stories
	]);
	
})->name('admin.sprint.finish');

$app->post('/finish', $me(), function() use($app) {
	
	$stories = $app->story->where('is_current', true)->get();
	
	$request = $app->request;
	
	$sprint = $app->sprint->create([
		'sprint_date' => Carbon::today(),
	]);
	
	$storypoints_completed = 0;
	
	foreach ($stories as $story) {
		
		$done = $request->post($story->id);
		if ($done === 'on') {
			$storypoints_completed += $story->storypoints;
			$story->update([
				'is_current' => false,
				'is_done' => true,
				'completed_at' => Carbon::today(),
				'sprint_id' => $app->sprint->where('sprint_date', Carbon::today())->first()->id
			]);
		} else {
			$story->update([
				'is_current' => false
			]);
		}
	}
	$sprint->update([
		'storypoints_completed' => $storypoints_completed
	]);
	
	$app->flash('global','Sprint finished, create the next one.');
	return $app->response->redirect($app->urlFor('admin.sprint.create'));
	
})->name('admin.sprint.finish.post');
