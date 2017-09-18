@extends('layouts.mainapp')

@section('content')

<!-- this is the wrapper for the content -->
<div class="st-content">
	<!-- extra div for emulating position:fixed of the menu -->
	<div class="st-content-inner">
		<div class="container-fluid">
			<!-- new code -->
			{{ HTML::ul($errors->all()) }}
			<!-- if there are creation errors, they will show here -->
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
				{{ Form::model($genericfriendsedit, array('action' => array('GenericInfoFriendsController@update', $genericfriendsedit->AFR_ID), 'method' => 'PUT')) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofriends') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="FRIENDS INFORMATION" />
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
										  <div class="col-sm-8"><input id="Title" name="Title" type="text" class="form-control" value="{{$genericfriendsedit->Title}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
										  <div class="col-sm-8"><input id="FirstName" name="FirstName" type="text" class="form-control" value="{{$genericfriendsedit->FirstName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
										  <div class="col-sm-8"><input id="MiddleName" name="MiddleName" type="text" class="form-control" value="{{$genericfriendsedit->MiddleName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
										  <div class="col-sm-8"><input id="LastName" name="LastName" type="text" class="form-control" value="{{$genericfriendsedit->LastName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
										  <div class="col-sm-8">
											<select name="Gender"  class="form-control">
												<option value="">Select</option>
												@foreach($gendermaster as $gender)
													<option {{$genericfriendsedit->Gender == $gender->GM_ID ? 'selected="selected"' : ''}} value="{{$gender->GM_ID}}">{{$gender->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-8"><input id="DateOfBirth" name="DateOfBirth" type="text" class="form-control datepicker" value="{{$genericfriendsedit->DOB}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8"><input id="MobileNumber" name="MobileNumber" type="text" class="form-control" value="{{$genericfriendsedit->MobileNo}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-8"><input id="ProfileImage" name="ProfileImage" type="file" class="form-control" value="{{$genericfriendsedit->ProfileImage}}"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Age</span></div>
										  <div class="col-sm-8"><input id="Age" name="Age" type="text" class="form-control" value="{{$genericfriendsedit->Age}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Relationship</span></div>
										  <div class="col-sm-8">
											<select name="Relationship" id="Relationship" class="form-control">
												<option>Select</option>
												@foreach($relation as $realtionfamily)
													<option {{$genericfriendsedit->Relationship == $realtionfamily->id ? 'selected="selected"' : ''}} value="{{$realtionfamily->id}}">{{$realtionfamily->value}} </option>
												@endforeach
											</select> 
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
										  <div class="col-sm-8"><input id="Nationality" name="Nationality" type="text" class="form-control" value="{{$genericfriendsedit->Nationality}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Religion</span></div>
										  <div class="col-sm-8"><input id="Religion" name="Religion" type="text" class="form-control" value="{{$genericfriendsedit->Religion}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Marital Status</span></div>
										  <div class="col-sm-8">
											<select name="MaritalStatus"  class="form-control">
												<option value="">Select</option>
												@foreach($maritalstatus as $marital)
													<option {{$genericfriendsedit->MaritalStatus == $marital->MS_ID ? 'selected="selected"' : ''}} value="{{$marital->MS_ID}}">{{$marital->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8"><input id="MarriedSince" name="MarriedSince" type="text" class="form-control datepicker" value="{{$genericfriendsedit->MarriedSince}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
										  <div class="col-sm-8">
											<select name="NoOfChildrens"  class="form-control">
												<option value="">Select</option>
												@foreach($childmaster as $child)
													<option {{$genericfriendsedit->NoOfChildrens == $child->CM_ID ? 'selected="selected"' : ''}} value="{{$child->CM_ID}}">{{$child->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									</ul>
								</div>
								<input id="hiddenid" name="hiddenid" type="hidden" value="{{$genericfriendsedit->AFR_ID}}" class="form-control">
								<div class="form-group margin-none pull-right">
									<div class="col-sm-9">
										{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
									</div>
								</div>
							</div>
						  </div>
						</div>
					{{ Form::close() }}
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
