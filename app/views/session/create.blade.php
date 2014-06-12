@extends("layouts.master")

@section("content")

  {{ Form::open(array("route" => "session.create", "class" => "form-signin")) }}

    @if(Session::has("login_errors"))
      <span class="alert alert-danger">Email or password incorrect!</span>
    @endif

    <h3 class="form-signin-heading">Please sign in</h3>

    {{ Form::text("email", "", array("class" => "form-control",
                                     "placeholder" => "Enter you e-mail address",
                                     "type" => "email")) }}
    
    {{ Form::password("password", array("class" => "form-control",
                                        "placeholder" => "Enter you password",
                                        "type" => "password")) }}

     <div class="text-center"> {{ Form::submit("Login", array("class" => "btn btn-lg btn-primary")) }} </div>


  {{ Form::close() }}

@stop
