@extends('layouts.loginapp')

@section('content')
    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-default navbar-fixed-top" role="navigation" style="background: #26a69a;">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-bars"></i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs "><i class="fa fa-comments"></i></a>
          <a class="navbar-brand navbar-brand-primary hidden-xs" href="index.html">LRP</a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
		<form class="form-horizontal" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
		  <ul class="nav navbar-nav navbar-right hidden-xs" style="margin: 7.5px 10px;">
			<li class="pull-left">
				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</li>
			<li class="pull-left">
				<input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</li>
			<li class="pull-right">
			  <button type="submit" class="btn btn-primary">
				Login
			<i class="fa fa-fw fa-unlock-alt"></i>
			</button>
			</li>
		  </ul>
		  </form>
        </div>
      </div>
    </div>


    <!-- content push wrapper -->
    <div class="st-pusher">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container-fluid">
            <div class="row tab-content">
              <div class="col-md-7">
                    <div class="tab-pane fade active in" id="profile">
					<span style="font-size:26px; font-weight:normal;margin-bottom:10px;display:block">Welcome to LRP</span>
                      <p style="text-align:justify">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                        booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente
                        labore stumptown.</p>
						<img src="images/4.png" >
                    </div>
              </div>
			  <div class="col-md-1"></div>
              <div class="col-md-4">
                <div class="lock-container">
				  <span style="font-size:20px; font-weight:normal;margin-bottom:10px;display:block">Create an account</span>
				  <div class="panel panel-default text-center">

					<div class="panel-body">
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
						 <div class="form-group">
							 <div class="col-md-12">
								<button type="submit" class="btn btn-primary form-control height45">
								  Sign Up
								  <i class="fa fa-fw fa-unlock-alt"></i>
								</button>
							</div>
						</div>
						<div class="or">OR</div>
						<img src="images/login.png" >
						<!--<div class="form-group">
							 <div class="col-md-12">
								<button type="button" class="btn btn-info form-control height45" style="background:#32508E">
								  <i class="fa fa-facebook-official"></i>Log in with facebook
								</button>
							</div>
						</div>
						<div class="form-group">
							 <div class="col-md-12">
								<button type="button" class="btn btn-info form-control height45">
								  Log in with Twitter
								</button>
							</div>
						</div>
						<div class="form-group">
							 <div class="col-md-12">
								<button type="button" class="btn btn-danger form-control height45">
								  Log in with Google+
								</button>
							</div>
						</div>-->
					  </form>
					  
					</div>
				  </div>
				</div>
              </div>
            </div>

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
@endsection
