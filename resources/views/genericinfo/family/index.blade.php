@extends('layouts.mainapp')

@section('content')

<!-- this is the wrapper for the content -->
<div class="st-content">
	<!-- extra div for emulating position:fixed of the menu -->
	<div class="st-content-inner">
		<div class="container-fluid">
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		{{ HTML::ul($errors->all() )}}
			<!-- new code -->
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
                      <li class="list-group-item" title="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}">
                        <a href="{{ URL::to('genericinfofamily/' . $values->AFM_ID) }}" class="pointer">
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
                <form class="form-horizontal" role="form" action="{{ URL::to('genericinfofamily') }}" enctype="multipart/form-data" method="post">
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
												<option value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
											@endforeach
										</select>
									  </div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted star-class">Priority</span></div>
									  <div class="col-sm-8">
										<input required name="Priority" min="1" max="100" type="number" class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted star-class">Title</span></div>
										  <div class="col-sm-8">
										  <select name="Title" required class="form-control">
												<option value="">Select</option>
												@foreach($titlemaster as $title)
													<option value="{{$title->TM_ID}}">{{$title->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">First Name</span></div>
										  <div class="col-sm-8"><input required name="FirstName" type="text"  class="form-control"></div>
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
										  <div class="col-sm-4"><span class="text-muted star-class">Last Name</span></div>
										  <div class="col-sm-8"><input required name="LastName" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span required class="text-muted star-class">Gender</span></div>
										  <div class="col-sm-8">
											<select name="Gender"  class="form-control">
												<option value="">Select</option>
												@foreach($gendermaster as $gender)
													<option value="{{$gender->GM_ID}}">{{$gender->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-4"><input name="DateOfBirth" type="text" placeholder="DD/MM/YYYY" class="form-control datepicker ageCalculate"></div>
										  <div class="col-sm-4"><input id="Age" name="Age" type="text" class="form-control AgeVal" placeholder="Age" readonly></div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-8"><input name="Image" type="file" accept="image/*" class="form-control"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8"><input id="MobileNumber" name="MobileNumber" placeholder="+91-949822568" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Relationship</span></div>
										  <div class="col-sm-8">
											<select name="Relationship" required class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted star-class">Nationality</span></div>
										  <div class="col-sm-8">
										  <select name="Nationality" required class="form-control">
													<option value="">Select</option>
													@foreach($countrymaster as $country)
														<option value="{{$country->CM_ID}}">{{$country->Name}} </option>
													@endforeach
												</select>
										 </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted star-class">Religion</span></div>
										  <div class="col-sm-8">
										  <select name="Religion" required class="form-control star-class">
														<option value="">Select</option>
														@foreach($religionmaster as $religion)
															<option value="{{$religion->RM_ID}}">{{$religion->Name}} </option>
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
													<option value="{{$marital->MS_ID}}">{{$marital->Name}} </option>
												@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8"><input name="MarriedSince" placeholder="DD/MM/YYYY" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">No. Of Childrens</span></div>
										  <div class="col-sm-8"><input name="NoOfChildrens" min="1" max="100" type="number" class="form-control">
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
