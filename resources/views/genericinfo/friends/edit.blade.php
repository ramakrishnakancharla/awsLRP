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
					<?php $img = DB::table('addfriendsrelatives')->where('AFR_ID',$values->AFR_ID)->get();?>
                      <li class="list-group-item" title="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}">
                        <a href="{{ URL::to('genericinfofriends/' . $values->AFR_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                               <img src="{{URL::to($img[0]->Folder.$img[0]->Image)}}" width="50" height="48" alt="NO IMAGE"  class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{str_limit($values->FirstName." ".$values->MiddleName." ".$values->LastName,18)}}</span>
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
				{{ Form::model($edit, array('action' => array('GenericInfoFriendsController@update', $edit->AFR_ID), 'method' => 'PUT','files' => true)) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofriends') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="FRIENDS & RELATIVE INFORMATION" />
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
										  <div class="col-sm-4"><span class="text-muted star-class">Title</span></div>
										  <div class="col-sm-8">
										  <select name="Title" required class="form-control">
												<option value="">Select</option>
												@foreach($titlemaster as $title)
													<option {{$edit->Title == $title->TM_ID ? 'selected="selected"' : ''}} value="{{$title->TM_ID}}">{{$title->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">First Name</span></div>
										  <div class="col-sm-8"><input required name="FirstName" type="text" class="form-control" value="{{$edit->FirstName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
										  <div class="col-sm-8"><input id="MiddleName" name="MiddleName" type="text" class="form-control" value="{{$edit->MiddleName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Last Name</span></div>
										  <div class="col-sm-8"><input required name="LastName" type="text" class="form-control" value="{{$edit->LastName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Gender</span></div>
										  <div class="col-sm-8">
											<select name="Gender" required class="form-control">
												<option value="">Select</option>
												@foreach($gendermaster as $gender)
													<option {{$edit->Gender == $gender->GM_ID ? 'selected="selected"' : ''}} value="{{$gender->GM_ID}}">{{$gender->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-4"><input name="DateOfBirth" type="text" class="form-control datepicker ageCalculate" value="{{Carbon\Carbon::parse($edit->DOB)->format('d/m/Y')}}"></div>
										  <div class="col-sm-4"><input  name="Age" type="text" class="form-control AgeVal" readonly value="{{$edit->Age}}"></div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-6"><input name="Image" type="file" accept="image/*" class="form-control"><input name="PhotoEdit" type="hidden" value="{{$edit->Image}}"></div>
										  <div class="col-sm-2"><img src="{{ URL::to($edit->Folder.$edit->Image) }}" class="image50x50 img-responsive"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8"><input id="MobileNumber" name="MobileNumber" type="text" class="form-control" value="{{$edit->MobileNo}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Relationship</span></div>
										  <div class="col-sm-8">
											<select name="Relationship" required class="form-control">
												<option>Select</option>
												@foreach($relation as $realtionfamily)
													<option {{$edit->Relationship == $realtionfamily->id ? 'selected="selected"' : ''}} value="{{$realtionfamily->id}}">{{$realtionfamily->value}} </option>
												@endforeach
											</select> 
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Nationality</span></div>
										  <div class="col-sm-8">
										  <select name="Nationality" required class="form-control">
													<option value="">Select</option>
													@foreach($countrymaster as $country)
														<option {{$edit->Nationality == $country->CM_ID ? 'selected="selected"' : ''}} value="{{$country->CM_ID}}">{{$country->Name}} </option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Religion</span></div>
										  <div class="col-sm-8">
										  <select name="Religion" required class="form-control">
														<option value="">Select</option>
														@foreach($religionmaster as $religion)
															<option {{$edit->Religion == $religion->RM_ID ? 'selected="selected"' : ''}} value="{{$religion->RM_ID}}">{{$religion->Name}} </option>
														@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Marital Status</span></div>
										  <div class="col-sm-8">
											<select name="MaritalStatus"  class="form-control">
												<option value="">Select</option>
												@foreach($maritalstatus as $marital)
													<option {{$edit->MaritalStatus == $marital->MS_ID ? 'selected="selected"' : ''}} value="{{$marital->MS_ID}}">{{$marital->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8"><input id="MarriedSince" name="MarriedSince" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->MarriedSince)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
										  <div class="col-sm-8"><input name="NoOfChildrens" value="{{$edit->NoOfChildrens}}" min="1" max="100" type="number" class="form-control">
										  </div>
										</div>
									  </li>
									</ul>
								</div>
								<input id="hiddenid" name="hiddenid" type="hidden" value="{{$edit->AFR_ID}}" class="form-control">
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
