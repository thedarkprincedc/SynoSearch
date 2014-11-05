<?php
error_reporting(E_ALL);
require_once("class.authenticate.php");
require_once("class.search.php");
require_once("class.logging.php");
require_once('../packages/Slim/Slim.php');
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->get('/', function () {
        echo "ujujujju";
    }
);

$app->group('/users', function () use ($app) {
	$auth = new authenticate();
	$app->get('/showusers', function () use ($auth){
		print(json_encode($auth->showuser()));
	});
	$app->post('/adduser', function () use ($app, $auth) { 
		$auth->adduser($app->request()->post());
	});
	$app->get('/removeuser/:id', function ($id) use ($app, $auth){
		 $auth->removeuser($id);
	});
	$app->post('/login', function () use ($app, $auth){
		 print(json_encode($auth->login($app->request->post())));
	});
	$app->post('/logout', function () use ($app, $auth){
	     print(json_encode($auth->logout($app->request->post())));
	});
	$app->get('/sessiondata', function () use ($app, $auth){
	    print(json_encode($auth->sessiondata()));
	});
});

$app->group('/search', function () use ($app) {
	$search = new search();
	$app->get('/db', function () use ($app, $search){
		print(json_encode($search->search($app->request->get())));
	});
	$app->get('/indexfolder', function () use ($app, $search){
		print(json_encode($search->indexfolder()));
	});
	$app->get('/showfolders', function () use ($app, $search){
		print(json_encode($search->showfolders($app->request->get())));
	});
	$app->post('/addfolder', function () use ($app, $search){
		print(json_encode($search->addfolder($app->request->post())));
	});
	$app->post('/removefolder', function () use ($app, $search){
		print(json_encode($search->addfolder($app->request->post())));
	});
});

$app->run();
?>