<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  protected $table = "users";
  protected $hidden = array("password", "remember_token");
  protected $fillable = array("email", "password_confirmation");
  protected $guarded = array("id", "password");

  public $autoPurgeRedundantAttributes = true;

  public function confessions()
  {
    return $this->hasMany("Confession");
  }

  public static $rules = array(
    "email" => "email|required",
    "password" => "required|min:6|confirmed",
    "password_confirmation" => "required|min:6"
  );

  public static $factory = array(
    "email" => "email",
    "password" => "password",
    "password_confirmation" => "password"
  );

}
