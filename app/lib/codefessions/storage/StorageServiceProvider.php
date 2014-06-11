<?php namespace Codefessions\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      "Codefessions\Storage\User\UserRepository",
      "Codefessions\Storage\User\EloquentUserRepository"
    );
  }
}
