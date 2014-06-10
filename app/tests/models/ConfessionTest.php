<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class ConfessionTest extends Testcase {
  
  public function testRelationshipWithUser()
  {
    $confession = FactoryMuff::create("Confession");

    $this->assertEquals($confession->user_id, $confession->user_id);
  }

  public function testUserIdIsRequired()
  {
    $confession = new Confession;
    $confession->body = "My body is ready!";

    $this->assertFalse($confession->save());

    $this->validateErrorMessage($confession->errors()->all(), "The user id field is required.");
  }

  public function testConfessionBodyIsRequired()
  {
    $confession = new Confession;
    $user = FactoryMuff::create("User");

    $this->assertFalse($user->confessions()->save($confession));

    $this->validateErrorMessage($confession->errors()->all(), "The body field is required.");
  }

  public function testConfessionSavesCorrectly()
  {
    $confession = FactoryMuff::create("Confession");

    $this->assertTrue($confession->save());
  }

  // Helper methods
  private function validateErrorMessage($errors, $message)
  {
    $this->assertCount(1, $errors);
    $this->assertEquals($errors[0], $message);
  }
}
