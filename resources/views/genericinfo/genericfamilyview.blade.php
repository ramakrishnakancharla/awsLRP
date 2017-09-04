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
					<ul class="list-group">
					@foreach($list as $key=>$values)
                      <li class="list-group-item genericfamily" attrId="{{$values}}">
                        <a class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
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
                <form class="form-horizontal" role="form" action="{{ route('genericfamilydata') }}" method="post">
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a class="btn btn-primary pointer">
                        <i class="fa fa-plus"></i> <input class="btn-primary bordernone" type="reset" value="Add New"/>
                      </a>
                    </div>
                    <input type="text" class="form-control share-text"  placeholder="FAMILY INFORMATION" />
                  </div>
                </div>
				{{ csrf_field() }}
					<div class="panel panel-default">
						  <div class="panel-heading panel-heading-gray">
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Family Member</span></div>
									  <div class="col-sm-8">
										<select name="Family"  class="form-control">
											<option value="">Select</option>
											@foreach($genericfamily as $family)
												<option value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
											@endforeach
											</select>
									  </div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Priority</span></div>
									  <div class="col-sm-8">
										<input id="Priority" name="Priority" type="text" class="form-control">
									  </div>
									</div>
								</div>
							</div>
						  </div>
						  
						  <div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Title</span></div>
										  <div class="col-sm-8"><input id="Title" name="Title" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
										  <div class="col-sm-8"><input id="FirstName" name="FirstName" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
										  <div class="col-sm-8"><input id="MiddleName" name="MiddleName" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
										  <div class="col-sm-8"><input id="LastName" name="LastName" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
										  <div class="col-sm-8">
											<select name="Gender" id="Gender" class="form-control">
												<option>Select</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Others">Others</option>
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-8"><input id="DateOfBirth" name="DateOfBirth" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8"><input id="MobileNumber" name="MobileNumber" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-8"><input id="ProfileImage" name="ProfileImage" type="file" class="form-control"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Age</span></div>
										  <div class="col-sm-8"><input id="Age" name="Age" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Relationship</span></div>
										  <div class="col-sm-8">
											<select name="Relationship" id="Relationship" class="form-control">
												<option>Select</option>
												@foreach($relation as $realtionfamily)
													<option value="{{$realtionfamily->id}}">{{$realtionfamily->value}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
										  <div class="col-sm-8"><input id="Nationality" name="Nationality" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Religion</span></div>
										  <div class="col-sm-8"><input id="Religion" name="Religion" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Marital Status</span></div>
										  <div class="col-sm-8">
												<select name="MaritalStatus" id="MaritalStatus" class="form-control">
													<option>Select</option>
													<option value="Single">Single</option>
													<option value="Married">Married</option>
													<option value="Divorced">Divorced</option>
													<option value="Separated">Separated</option>
													<option value="Widowed">Widowed</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8"><input id="MarriedSince" name="MarriedSince" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
										  <div class="col-sm-8">
											<select name="NoOfChildrens" id="NoOfChildrens" class="form-control">
												<option>Select</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										  </div>
										</div>
									  </li>
									</ul>
								</div>
								<input id="hiddenid" name="hiddenid" type="hidden" class="form-control">
								<div class="form-group margin-none pull-right">
									<div class="col-sm-9">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
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
