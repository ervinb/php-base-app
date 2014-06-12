<?php

class SessionControllerTest extends TestCase {

  public function testCreate()
  {
    $this->call("GET", "login");

    $this->assertResponseOk();
  }

  public function testStoreFaliure()
  {
    Auth::shouldReceive("attempt")->andReturn(false);

    $this->call("POST", "login");

    $this->assertRedirectedToRoute("session.create");
    $this->assertSessionHas("login_errors");
  }

  public function testStoreSuccess()
  {
    Auth::shouldReceive("attempt")->andReturn(true);

    $this->call("POST", "login");

    $this->assertRedirectedTo("/");
  }
}
