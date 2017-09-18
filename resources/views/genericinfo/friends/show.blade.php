@extends('layouts.mainapp')

@section('content')

<!-- this is the wrapper for the content -->
<div class="st-content">
	<!-- extra div for emulating position:fixed of the menu -->
	<div class="st-content-inner">
		<div class="container-fluid">
			<!-- new code -->
			<div class="container-fluid">
            <div class="media messages-container media-clearfix-xs-min media-grid">
              <div class="media-left">
                <div class="messages-list">
                  <div class="panel panel-default">
					<ul class="list-group listSearch">
					@foreach($list as $key=>$values)
                      <li class="list-group-item">
                        <a href="{{ URL::to('genericinfofriends/' . $values->AFR_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="../../images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{$values->FirstName}}</span>
                              <div class="message">DOB : {{Carbon\Carbon::parse($values->DOB)->format('d/m/Y')}}</div>
                            </div>
                          </div>
                        </a>
                      </li>
					@endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="media-body">
                <form class="form-horizontal" role="form" action="#" method="post">
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofriends') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="FRIENDS INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofriends/' . $genericfriendsview->AFR_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'genericinfofriends/' . $genericfriendsview->AFR_ID, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
                    </div>
                  </div>
                </div>
				{{ csrf_field() }}
					<div class="panel panel-default">
						  <div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Title</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Title}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->FirstName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->MiddleName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->LastName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Gender}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->DOB}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->MobileNo}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Image}}</div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Age</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Parent}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Relationship</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Relationship}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Nationality}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Religion</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->Religion}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Marital Status</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->MaritalStatus}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->MarriedSince}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
										  <div class="col-sm-8">: {{$genericfriendsview->NoOfChildrens}}</div>
										</div>
									  </li>
									</ul>
								</div>
							</div>
						  </div>
						</div>
					</form>
              </div>
            </div>
          </div>
		</div>
		<!-- /st-content-inner -->
	</div>
	<!-- /st-content -->

</div>
<!-- /st-content -->

@endsection
