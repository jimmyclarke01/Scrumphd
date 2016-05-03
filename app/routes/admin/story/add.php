<?php

$app->get('/admin/story/add', $admin(), function() use ($app) {
    $app->render('admin/story/add.php');
})->name('admin.story.add');

$app->post('/add', $admin(), function() use($app) {
	
	$request = $app->request;
	
	$story1 = $request->post('story1');
	$story2 = $request->post('story2');
	$story3 = $request->post('story3');
	$def_of_done = $request->post('def_of_done');
	$value = $request->post('value');
	$urgency = $request->post('urgency');
	$priority = $urgency * $value;
	$storypoints = $request->post('storypoints');
	
	$v = $app->validation;
    
    $v->validate([
        'story1' => [$story1, 'required|max(500)'],
        'story2' => [$story2, 'required|max(500)'],
        'story3' => [$story3, 'required|max(500)'],
		'def_of_done' => [$def_of_done, 'required|max(500)'],
		'storypoints' => [$storypoints, 'required|validStorypoints|max(3)'],
    ]);
    
    if ($v->passes()) {
        $app->story->create([
		'story1' => $story1,
		'story2' => $story2,
		'story3' => $story3,
		'value' => $value,
		'urgency' => $urgency,
		'priority' => $priority,
		'storypoints' => $storypoints,
		'def_of_done' => $def_of_done,
		'is_current' => false,
		'is_done' => false
		
	]);
        
    $app->flash('global', 'The story has been added to the backlog.');
    return $app->response->redirect($app->urlFor('admin.backlog.priority-descending'));
        
    }
    
    $app->render('admin/story/add.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);
	
})->name('admin.story.add.post');