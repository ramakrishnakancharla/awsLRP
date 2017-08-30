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
          <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
            <button type="submit" class="btn btn-primary">
            Send Password Reset Link
            </button>

          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
