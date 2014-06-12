@extends("layouts.master")

@section("content")

  {{ Form::open(array("url" => "users", "class" => "form-signin")) }}

    @if ( $errors->count() > 0  )
      <p>The following errors have occurred:</p>

      <ul>
        @foreach( $errors->all() as $message  )
          <li>{{ $message  }}</li>
        @endforeach
      </ul>
    @endif

    <h3 class="form-signin-heading">Registration</h3>

    {{ Form::text("email", "", array("class" => "form-control",
                                     "placeholder" => "Enter you e-mail address",
                                     "type" => "email")) }}
    
    {{ Form::password("password", array("class" => "form-control",
                                        "placeholder" => "Enter you password",
                                        "type" => "password")) }}

    <div class="text-center"> {{ Form::submit("Register", array("class" => "btn btn-lg btn-primary")) }} </div>


  {{ Form::close() }}


@stop
