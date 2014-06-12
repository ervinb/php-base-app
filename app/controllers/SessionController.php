<?php

use Codefessions\Storage\User\UserRepository as User;

class SessionController extends BaseController {

  protected $user;

  public function __contruct(User $user)
  {
    $this->user = $user;
  }

  public function create()
  {
    return View::make("session.create");
  }

  public function store()
  {
    if(Auth::attempt(array("email" => Input::get("email"), "password" => Input::get("password"))))
    {
      return Redirect::intended("/");
    }

    return Redirect::route("session.create")
      ->withInput()
      ->with("login_errors", true);
  }

  public function destroy()
  {
    Auth::logout();

    return View::make("session.destroy");
  }

}
