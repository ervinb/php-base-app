<?php

use LaravelBook\Ardent\Ardent;

class Confession extends Ardent {
  protected $fillable = array("body");

  public function user()
  {
    $this->belongsTo("User");
  }

  public static $rules = array(
    "body" => "required",
    "user_id" => "required"
  );

  public static $factory = array(
    "body" => "string",
    "user_id" => "factory|User"
  );
}
