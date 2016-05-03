<?php

$app->get('/admin/sprint/create.php', $me(), function() use ($app) {
	
	$stories = $app->story->where('is_done', false)->get()->sortByDesc('priority');
	
	$current = $app->story->where('is_current', true)->first();
	
	if ($current) {
		$app->flash('global', 'There is already a sprint ongoing');
		return $app->response->redirect($app->urlFor('admin.sprint.finish'));
	};
	
	$app->render('admin/sprint/create.php', [
		'stories' => $stories
	]);
	
})->name('admin.sprint.create');

$app->post('/create', $me(), function() use($app) {
	
	$stories = $app->story->where('is_current', false)->where('is_done', false)->get();
	
	$request = $app->request;
	
	foreach ($stories as $story) {
		
		$add = $request->post($story->id);
		if ($add === 'on') {
			$story->update([
				'is_current' => true
			]);
		}
	}
	$app->flash('global', 'Your sprint has been created');
	return $app->response->redirect($app->urlFor('admin.backlog.priority-descending'));
	
})->name('admin.sprint.create.post');

