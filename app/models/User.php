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
  protected $fillable = array("email");
  protected $guarded = array("id", "password");

  public $autoPurgeRedundantAttributes = true;

  public static $rules = array(
    "email" => "email|required",
    "password" => "required|alpha_num|min:8|confirmed",
    "password_confirmation" => "required|alpha_num|min:8"
  );

  public function confessions()
  {
    return $this->hasMany("Confession");
  }

}
