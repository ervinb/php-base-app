<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  protected $table = "users";
  protected $fillable = array("email", "password");
  protected $guarded = array("id", "password");

  public $autoPurgeRedundantAttributes = true;

  public function confessions()
  {
    return $this->hasMany("Confession");
  }

  public static $rules = array(
    "email" => "email|required",
    "password" => "required|min:6",
  );

  public static $factory = array(
    "email" => "email",
    "password" => "password",
  );

}
