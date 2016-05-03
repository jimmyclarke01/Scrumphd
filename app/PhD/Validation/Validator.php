<?php

namespace PhD\Validation;

use Violin\Violin;
use PhD\User\User;
use PhD\Helpers\Hash;

class Validator extends Violin
{
	protected $user;
	
	protected $hash;
	
	protected $auth;
	
	public function __construct(User $user, Hash $hash, $auth = null)
	{
		$this->user = $user;
		$this->hash = $hash;
		$this->auth = $auth;
		
		$this->addFieldMessages([
			'email' => [
				'uniqueEmail' => 'That email is already in use.'
			],
			'username' => [
				'uniqueUsername' => 'That username is already in use.'
			],
			'priority' => [
				'max' => 'That is not a valid priority level. Please choose a number between 0 and 25.',
				'min' => 'That is not a valid priority level. Please choose a number between 0 and 25.'
			],
			'password' => [
				'min' => 'Your password must be a minimum of {$0} characters long'
			],
			'password_confirm' => [
				'matches' => 'Passwords must match.'
			]
		]);
		
		$this->addRuleMessages([
			'required' => 'This field is required.',
		    'matchesCurrentPassword' => 'That does not match your current password.',
		    'validStorypoints' => 'That is not a valid number of storypoints. Please choose from 1, 2, 3, 5, 8, 13, 20, 40, 100.',
			'max' => 'There is a limit of {$0} characters for this field.',
			'alnumDash' => 'Your entry contains an invalid symbol.',
			'email' => 'Must be a valid email address.'
		]);
	}
	
	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value);
		
		if ($this->auth && $this->auth->email === $value) {
		    return true;
		}
		
		return ! (bool) $user->count();
	}
	
	public function validate_uniqueUsername($value, $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count();
	}
	
	public function validate_matchesCurrentPassword($value, $input, $args)
	{
	    if ($this->auth && $this->hash->passwordCheck($value, $this->auth->password)) {
	        return true;
	    }
	    
	    return false;
	    
	}
	
	public function validate_validStorypoints($value, $input, $args)
	{
		if($value == 1 or $value == 2 or $value == 3 or $value == 5 or $value == 8 or $value == 13 or $value == 20 or $value == 40 or $value == 100){
			return true;
		}
		
		return false;
	}
}