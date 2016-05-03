<?php

return [
	'app' => [
		'url' => 'http://scrumphd.dreamhosters.com',
		'hash' => [
			'algo' => PASSWORD_BCRYPT,
			'cost' => 10
		]
	],
	'db' => [
		'driver' => 'mysql',
		'host' => '208.97.162.197',
		'name' => 'scrumphd',
		'username' => 'scrumphd',
		'password' => '****************',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => ''
	],
	'auth' => [
		'session' => 'user_id',
		'remember' => 'user_r'
	],
	'mail' => [
		'smtp_auth' => false,
		'smtp_secure' => '',
		'host' => 'mailout.one.com',
		'username' => 'james@scrumphd.com',
		'password' => '*****************',
		'port' => 25,
		'html' => true,
		'from_email' => 'james@scrumphd.com',
		'from_name' => 'James Clarke',
		],
	'twig' => [
		'debug' => true
	],
	'csrf' => [
		'key' => 'csrf_token'
	]
];
