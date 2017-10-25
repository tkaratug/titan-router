<?php
include '../src/Titan/Router/Router.php';

use \Titan\Router\Router as Route;

// http://example.com/
Route::get('/', 'Home@index');

// http://example.com/hello/johndoe
Route::get('/hello/{alpha}', function($name){
	echo 'Hello ' . $name;
});

// http://example.com/frontend
Route::prefix('frontend')->group(function(){
	Route::get('/', function(){
		echo 'Frontend';
	});
});

// http://example.com/backend
Route::prefix('backend')->middleware(['auth'])->group(function(){
	Route::get('/', function(){
		echo 'Backend';
	});
});

// http://example.com/product/123
Route::namespace('product')->group(function(){
	Route::get('/product/{num}', 'Product@details');
});

// http://api.example.com/
Route::domain('api.example.com')->group(function(){
	Route::get('/', function(){
		echo 'This is api!';
	});
});

Route::execute();
