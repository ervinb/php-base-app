<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource("users", "UsersController");

Route::get('/', function()
{
	return View::make('hello');
});

Route::get("/mock_user", function()
{
  $user = new User;
  $user->email = "aliens@turija.com";
  $user->password = "tuk12345678";
  $user->password_confirmation = "tuk12345678";

  $user->save();

  var_dump($user);
});

Route::get("/confession", function()
{
  $confession = new Confession(array("body" => "I, Robot."));
  $user = User::find(1);
  $user->confessions()->save($confession);

  var_dump($confession);
});
