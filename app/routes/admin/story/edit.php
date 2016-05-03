<?php

$app->get('/story/:id', $admin, function($id) use($app) {
	
	$story = $app->story->where('id', $id)->first();
	
	if (!$story) {
		$app->notFound();
	}
	
	$app->render('admin/story/edit.php', [
		'story' => $story
	]);
	
})->name('admin.story.edit');

$app->post('/edit', $admin(), function() use($app) {
	
	$request = $app->request;
	
	$id = $request->post('id');
	$story = $app->story->where('id', $id)->first();
		
	$story1 = $request->post('story1');
	$story2 = $request->post('story2');
	$story3 = $request->post('story3');
	$value = $request->post('value');
	$urgency = $request->post('urgency');
	$priority = $value * $urgency;
	$storypoints = $request->post('storypoints');
	$def_of_done = $request->post('def_of_done');
	
	
	$v = $app->validation;
    
    $v->validate([
        'story1' => [$story1, 'required|max(500)'],
        'story2' => [$story2, 'required|max(500)'],
        'story3' => [$story3, 'required|max(500)'],
		'def_of_done' => [$def_of_done, 'required|max(500)'],
		'storypoints' => [$storypoints, 'required|validStorypoints|max(3)'],

    ]);
    
    if ($v->passes()) {
        $story->update([
		'story1' => $story1,
		'story2' => $story2,
		'story3' => $story3,
		'value' => $value,
		'urgency' => $urgency,
		'priority' => $priority,
		'storypoints' => $storypoints,
		'def_of_done' => $def_of_done
		
	]);
        
    $app->flash('global', 'The story has been updated.');
    return $app->response->redirect($app->urlFor('admin.backlog.priority-descending'));
        
    }
    
    $app->render('admin/story/edit.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);
	
})->name('admin.story.edit.post');