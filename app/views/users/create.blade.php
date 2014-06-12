@extends("layouts.master")

@section("content")

  {{ Form::open(array("route" => "users.create")) }}

  {{ Form::label("email", "Email Address") }}
  {{ Form::text("email") }}

  {{ Form::label("password", "Password") }}
  {{ Form::password("password") }}

  {{ Form::submit("Create account")  }}

  {{ Form::close()  }}

@stop
