<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;

use PhD\User\User;
use PhD\Mail\Mailer;
use PhD\Helpers\Hash;
use PhD\Validation\Validator;
use PhD\Story\Story;
use PhD\Sprint\Sprint;

use PhD\Middleware\CsrfMiddleware;
use PhD\Middleware\BeforeMiddleware;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT . '/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->add(new CsrfMiddleware);
$app->add(new BeforeMiddleware);

$app->configureMode($app->config('mode'), function() use($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'filters.php';
require 'routes.php';

$app->auth = false;

$app->container->set('user', function() {
	return new User;
});

$app->container->singleton('story', function() {
	return new Story;
});

$app->container->singleton('sprint', function() {
	return new Sprint;
});

$app->container->singleton('hash', function() use ($app) {
	return new Hash($app->config);
});

$app->container->singleton('validation', function() use($app) {
	return new Validator($app->user, $app->hash, $app->auth);
});

$app->container->singleton('mail', function() use($app) {
	$mailer = new PHPMailer;
	
	//$mailer->isSMTP();
	$mailer->SMTPDebug = 2;
	$mailer->Debugoutput = 'html';
	
	$mailer->Host = $app->config->get('mail.host');
	//$mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
	//$mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
	$mailer->Port = $app->config->get('mail.port');
	//$mailer->Username = $app->config->get('mail.username');
	//$mailer->Password = $app->config->get('mail.password');
	$mailer->isHTML($app->config->get('mail.html'));
	$mailer->SetFrom($app->config->get('mail.from_email'), $app->config->get('mail.from_name'));
	
	return new Mailer($app->view, $mailer);
});

$app->container->singleton('randomlib', function() {
   $factory = new RandomLib;
   return $factory->getMediumStrengthGenerator();
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
	new TwigExtension
];