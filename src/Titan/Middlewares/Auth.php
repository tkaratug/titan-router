<?php
namespace Titan\Middlewares;

class Auth
{
	
	public function handle()
	{
		echo 'Auth middleware';
		exit();
	}

}