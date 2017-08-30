@extends('auth.authlayout')

@section('content')
<div id="content">
  <div class="container-fluid">

    <div class="lock-container">
      <h1>Register</h1>
      <div class="panel panel-default text-center">

        <div class="panel-body" style="margin-top:20px">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <div class="col-md-12">
                   <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" required>

                   @if ($errors->has('email'))
                       <span class="help-block">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                   @endif
               </div>
             </div>
             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <div class="col-md-12">
                   <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                   @if ($errors->has('password'))
                       <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
               </div>
             </div>
             <div class="form-group">
                 <div class="col-md-12">
                     <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                 </div>
             </div>
            <a href="{{ route('login') }}">
              <button type="button" class="btn btn-primary">
                Login
                <i class="fa fa-fw fa-unlock-alt"></i>
              </button>
            </a>
            <button type="submit" class="btn btn-primary">
              Sign Up
              <i class="fa fa-fw fa-unlock-alt"></i>
            </button>

          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
