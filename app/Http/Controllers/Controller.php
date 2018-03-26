<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    	//homepage
    public function homepage()
    {
    	return view('welcome');
    }
        //register
    public function register()
    {
    	return view('register');
    }
        //login
    public function login()
    {
    	return view('login');
    }
}
