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
                        <a href="{{ URL::to('general-personal-data/' . $values->GPD_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="../../images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
							  <span class="pull-right" style="color:green">
								  @if($values->MetaID =='1')
									  Self
								  @elseif($values->MetaID =='2')
									  Family
								  @elseif($values->MetaID =='3')
									  Friend
								  @endif
							  </span>
                              <span class="user">{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}</span>
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
				{{ Form::model($generalpersonaldataedit, array('action' => array('general\PersonalDataController@update', $generalpersonaldataedit->GPD_ID), 'method' => 'PUT')) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('general-personal-data') }}" class="btn btn-primary pointer">Add New</a>
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
									  <div class="col-sm-4"><span class="text-muted">Choose Option</span></div>
									  <div class="col-sm-8">
										    <select name="options" id="options" class="form-control">
											@foreach($metadata as $meta)
												<option {{$generalpersonaldataedit->MetaID == $meta->id ? 'selected="selected"' : ''}}  value="{{$meta->id}}">{{$meta->value}}</option>
											@endforeach
											</select>
									  </div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">To Whom?</span></div>
									  <div class="col-sm-8">
									    <input type="text" class="form-control" name="SelfId" id="SelfId" readonly value="{{Auth::user()->name}}" />
										<select name="FamilyId" id="FamilyId" class="form-control">
											@foreach($genericfamily as $family)
												<option {{$generalpersonaldataedit->MetaID == $family->AFM_ID ? 'selected="selected"' : ''}}   value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
											@endforeach
										</select>
										<select name="FriendsId" id="FriendsId" class="form-control">
											@foreach($genericfriends as $friends)
												<option {{$generalpersonaldataedit->MetaID == $friends->AFR_ID ? 'selected="selected"' : ''}}  value="{{$friends->AFR_ID}}">{{$friends->FirstName}} {{$friends->MiddleName}} {{$friends->LastName}}</option>
											@endforeach
										</select>
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
									  <div class="col-sm-4"><span class="text-muted">Valid From</span></div>
									  <div class="col-sm-8"><input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($generalpersonaldataedit->ValidFrom)->format('d/m/Y')}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Title</span></div>
									  <div class="col-sm-8">
										<select name="Title"  class="form-control">
												<option value="">Select</option>
												@foreach($titlemaster as $title)
													<option {{$generalpersonaldataedit->Title == $title->TM_ID ? 'selected="selected"' : ''}} value="{{$title->TM_ID}}">{{$title->Name}} </option>
												@endforeach
											</select>
										</div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
									  <div class="col-sm-8"><input id="FirstName" name="FirstName" type="text" class="form-control" value="{{$generalpersonaldataedit->FirstName}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
									  <div class="col-sm-8"><input id="MiddleName" name="MiddleName" type="text" class="form-control" value="{{$generalpersonaldataedit->MiddleName}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
									  <div class="col-sm-8"><input id="LastName" name="LastName" type="text" class="form-control" value="{{$generalpersonaldataedit->LastName}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
									  <div class="col-sm-8">
										<select name="Gender"  class="form-control">
											<option value="">Select</option>
											@foreach($gendermaster as $gender)
												<option {{$generalpersonaldataedit->Gender == $gender->GM_ID ? 'selected="selected"' : ''}} value="{{$gender->GM_ID}}">{{$gender->Name}} </option>
											@endforeach
										</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
									  <div class="col-sm-4"><input name="DateOfBirth" type="text" class="form-control datepicker ageCalculate" value="{{Carbon\Carbon::parse($generalpersonaldataedit->DOB)->format('d/m/Y')}}"></div>
									  <div class="col-sm-4"><input  name="Age" type="text" class="form-control AgeVal" readonly value="{{$generalpersonaldataedit->Age}}"></div>
									</div>
								  </li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list-unstyled profile-about margin-none">
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
									  <div class="col-sm-8"><input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($generalpersonaldataedit->ValidTo)->format('d/m/Y')}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
									  <div class="col-sm-8">
											<select name="Nationality"  class="form-control">
													<option value="">Select</option>
													@foreach($countrymaster as $country)
														<option {{$generalpersonaldataedit->Nationality == $country->CM_ID ? 'selected="selected"' : ''}} value="{{$country->CM_ID}}">{{$country->Name}} </option>
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
														<option {{$generalpersonaldataedit->Religion == $religion->RM_ID ? 'selected="selected"' : ''}} value="{{$religion->RM_ID}}">{{$religion->Name}} </option>
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
												<option {{$generalpersonaldataedit->MaritalStatus == $marital->MS_ID ? 'selected="selected"' : ''}} value="{{$marital->MS_ID}}">{{$marital->Name}} </option>
											@endforeach
										</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
									  <div class="col-sm-8"><input id="MarriedSince" name="MarriedSince" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($generalpersonaldataedit->MarriedSince)->format('d/m/Y')}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
									  <div class="col-sm-8">
										<select name="NoOfChildrens"  class="form-control">
											<option value="">Select</option>
											@foreach($childmaster as $child)
												<option {{$generalpersonaldataedit->NoOfChildrens == $child->CM_ID ? 'selected="selected"' : ''}} value="{{$child->CM_ID}}">{{$child->Name}} </option>
											@endforeach
										</select>
									  </div>
									</div>
								  </li>
								</ul>
							</div>
							<input id="hiddenid" name="hiddenid" type="hidden" value="{{$generalpersonaldataedit->AFM_ID}}" class="form-control">
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
