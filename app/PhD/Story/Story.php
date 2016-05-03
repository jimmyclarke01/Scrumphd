<?php

namespace PhD\Story;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Story extends Eloquent
{
	protected $table = 'stories';
	
	protected $fillable = [
		'story1',
		'story2',
		'story3',
		'sprint_id',
		'storypoints',
		'value',
		'urgency',
		'priority',
		'def_of_done',
		'is_current',
		'is_done',
		'completed_at',
		'created_at',
		'updated_at',
	];
	
	public function getStory()
	{
		return "As a {$this->story1}, it needs to be possible to {$this->story2}, so that {$this->story3}";
	}
	
	public function getPriority()
	{
		return "Priority: {$this->priority}";
	}
	
	public function getStorypoints()
	{
		return "Storypoints: {$this->storypoints}";
	}
	
	public function getDefOfDone()
	{
		return "Definition of done: {$this->def_of_done}";
	}
}