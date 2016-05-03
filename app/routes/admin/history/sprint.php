<?php

$app->get('/sprints/:sprint_date', $admin(), function($sprint_date) use($app) {
    
    $sprint = $app->sprint->where('sprint_date', $sprint_date)->first();
    
    if (!$sprint_date) {
        $app->notFound();
    }
	
	$sprint->formatted_sprint_date = date("F d, Y", strtotime($sprint->sprint_date));
	
	$stories = $app->story->where('sprint_id',$sprint->id)->get();
    
    $app->render('admin/history/sprint.php', [
        'sprint' => $sprint,
		'stories' => $stories
    ]);
    
})->name('admin.history.sprint');

$app->post('/sprint', $me(), function() use($app) {
	
	$request = $app->request;
	
	$box = $request->post('box');
	
	$url = $request->post('url');
	
	$sprint = $app->sprint->where('id', $request->post('id'))->first();
	
	$v = $app->validation;
    
    $v->validate([
        'box' => [$box, 'required|url'],
    ]);
    
    if ($v->passes()) {
        $sprint->update([
		'box' => $box		
	]);
        
    $app->flash('global', 'The box link has been added');
    return $app->response->redirect($url);
    }
    
    $app->render('admin/history/sprint.php', [
        'errors' => $v->errors(),
        'request' => $request
    ]);
	
})->name('admin.history.sprint.post');