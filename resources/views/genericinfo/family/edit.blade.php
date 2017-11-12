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
						<?php
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->AFM_ID)->get(); 
						?>
                      <li class="list-group-item">
                        <a href="{{ URL::to('genericinfofamily/' . $values->AFM_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="{{URL::to($img[0]->Folder.$img[0]->Image)}}" width="50" height="48" alt="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}" title="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user" title="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName,18}}">{{str_limit($values->FirstName." ".$values->MiddleName." ".$values->LastName,18)}}</span>
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
				{{ Form::model($edit, array('action' => array('GenericInfoFamilyController@update', $edit->AFM_ID), 'method' => 'PUT','files' => true)) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofamily') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="FAMILY INFORMATION" />
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
											@foreach($list as $family)
												<option {{$edit->Parent == $family->AFM_ID ? 'selected="selected"' : ''}} value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
											@endforeach
											</select>
									  </div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Priority</span></div>
									  <div class="col-sm-8">
										<input id="Priority" name="Priority" min="1" max="100" type="number" class="form-control" value="{{$edit->Priority}}">
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
										  <div class="col-sm-8">
										  <select name="Title"  class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
										  <div class="col-sm-8"><input id="FirstName" name="FirstName" type="text" class="form-control" value="{{$edit->FirstName}}"></div>
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
										  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
										  <div class="col-sm-8"><input id="LastName" name="LastName" type="text" class="form-control" value="{{$edit->LastName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
										  <div class="col-sm-8">
											<select name="Gender"  class="form-control">
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
										  <div class="col-sm-4"><input name="DateOfBirth" type="text" placeholder="DD/MM/YYYY" class="form-control datepicker ageCalculate" value="{{Carbon\Carbon::parse($edit->DOB)->format('d/m/Y')}}"></div>
										  <div class="col-sm-4"><input  name="Age" type="text" class="form-control AgeVal" readonly value="{{$edit->Age}}"></div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-6"><input  name="Image" type="file" accept="image/*" class="form-control"></div>
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
										  <div class="col-sm-8"><input id="MobileNumber" name="MobileNumber" placeholder="+91-949822568" type="text" class="form-control" value="{{$edit->MobileNo}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Relationship</span></div>
										  <div class="col-sm-8">
											<select name="Relationship" id="Relationship" class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
										  <div class="col-sm-8">
										  <select name="Nationality"  class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">Religion</span></div>
										  <div class="col-sm-8">
												<select name="Religion"  class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">No. Of Childrens</span></div>
										  <div class="col-sm-8">
											<input name="NoOfChildrens" value="{{$edit->NoOfChildrens}}" min="1" max="100" type="number" class="form-control">
										  </div>
										</div>
									  </li>
									</ul>
								</div>
								<input id="hiddenid" name="hiddenid" type="hidden" value="{{$edit->AFM_ID}}" class="form-control">
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
