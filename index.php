<?php
include 'vendor/autoload.php';

use \Titan\Router\Router as Route;

Route::get('/', 'Home@index');

Route::prefix('frontend')->group(function(){
	Route::get('/', function(){
		echo 'Frontend';
	});
});

Route::prefix('backend')->middleware(['auth'])->group(function(){
	Route::get('/', function(){
		echo 'Backend';
	});
});

Route::execute();
