<?php namespace Codefessions\Storage\User;

interface UserRepository {

  public function all();

  public function find($id);

  public function create($input);

  public function update($input);
}
