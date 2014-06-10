<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class UserTest extends TestCase {

  public function testIsTrue()
  {
    $this->assertTrue(true);
  }

  public function testEmailIsRequired()
  {
    $user = new User;
    $user->password = "password";
    $user->password_confirmation = "password";

    $this->assertFalse($user->save());

    $errors = $user->errors()->all();
    $this->assertCount(1, $errors);

    $this->assertEquals($errors[0], "The email field is required.");
  }

}
