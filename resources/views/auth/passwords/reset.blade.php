@extends('auth.authlayout')

@section('content')
<div id="content">
  <div class="container-fluid">

    <div class="lock-container">
      <h1>Reset Password</h1>
      <div class="panel panel-default text-center">

        <div class="panel-body" style="margin-top:20px">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

          <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
              {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">

             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <div class="col-md-12">
                   <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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
           <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
               <div class="col-md-12">
                   <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                   @if ($errors->has('password_confirmation'))
                       <span class="help-block">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                       </span>
                   @endif
               </div>
           </div>
            <button type="submit" class="btn btn-primary">
              Reset Password
            </button>

          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
