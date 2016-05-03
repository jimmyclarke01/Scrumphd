<?php

namespace PhD\Sprint;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Sprint extends Eloquent
{
	protected $table = 'sprints';
	
	protected $fillable = [
		'sprint_date',
		'box',
		'storypoints_completed'
	];
}