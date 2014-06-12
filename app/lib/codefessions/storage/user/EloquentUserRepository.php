<?php namespace Codefessions\Storage\User;

use User;

class EloquentUserRepository implements UserRepository {

  public function all()
  {
    User::all();
  }

  public function find($id)
  {
    User::find($id);
  }

  public function create($input)
  {
    User::create($input);
  }

  public function update($id)
  {
    $user = User::find($id);

    $user->save(\Input::all());

    return $user;
  }

  public function delete($id)
  {
    $user = User::find($id);

    return $user->delete();
  }
}
