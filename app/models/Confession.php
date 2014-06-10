<?php
class Confession extends Eloquent { 
  protected $fillable = array("body");
  
  public function user()
  {
    $this->belongsTo("User");
  }
}
