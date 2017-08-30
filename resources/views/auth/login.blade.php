@extends('auth.authlayout')

@section('content')
<div id="content">
  <div class="container-fluid">

    <div class="lock-container">
      <h1>Account Access</h1>
      <div class="panel panel-default text-center">
        <img src="images/people/110/guy-5.jpg" class="img-circle">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-12">
            <input id="password" type="password" class="form-control" placeholder="Enter Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          </div>
          <a href="{{ route('register') }}">
          <button type="button" class="btn btn-primary">
            Sign Up
            <i class="fa fa-fw fa-unlock-alt"></i>
          </button>
          </a>
            <button type="submit" class="btn btn-primary">
                Login
            <i class="fa fa-fw fa-unlock-alt"></i>
            </button>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
