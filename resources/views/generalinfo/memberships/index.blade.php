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
                      <li class="list-group-item">
                        <a href="{{ URL::to('general-memberships/' . $values->GMS_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
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
                              <span class="user">{{$values->OrganizationName}}</span>
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
                <form class="form-horizontal" role="form" action="{{ URL::to('general-memberships') }}" enctype="multipart/form-data" method="post">
					<div class="panel panel-default share">
					  <div class="input-group">
						<div class="input-group-btn">
						  <a href="{{ URL::to('general-memberships') }}" class="btn btn-primary pointer">Add New</a>
						</div>
						<input type="text" class="form-control share-text allSearch"  placeholder="MEMBERSHIP INFORMATION" />
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
											<option value="{{$meta->id}}">{{$meta->value}}</option>
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
											<option value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
										@endforeach
									</select>
									<select name="FriendsId" id="FriendsId" class="form-control">
										@foreach($genericfriends as $friends)
											<option value="{{$friends->AFR_ID}}">{{$friends->FirstName}} {{$friends->MiddleName}} {{$friends->LastName}}</option>
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
									  <div class="col-sm-8"><input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Organization Name</span></div>
									  <div class="col-sm-8"><input id="OrganizationName" name="OrganizationName" type="text" class="form-control"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Membership Type</span></div>
									  <div class="col-sm-8">
											<select name="MembershipType" id="MembershipType" class="form-control">
												<option>Select</option>
												@foreach($membershiptype as $typeList)
													<option value="{{$typeList->MTM_ID}}">{{$typeList->Name}} </option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Membership Fees</span></div>
									  <div class="col-sm-8"><input id="MembershipFees" name="MembershipFees" type="text" class="form-control"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Allowed For Members</span></div>
									  <div class="col-sm-8">
											<select name="AllowedForMembers" id="AllowedForMembers" class="form-control">
												<option>Select</option>
												@foreach($allowed as $allowedList)
													<option value="{{$allowedList->MAM_ID}}">{{$allowedList->Name}} </option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
									  <div class="col-sm-8">
											<select name="DocType" id="DocType" class="form-control">
												<option>Select</option>
												@foreach($documenttype as $type)
													<option value="{{$type->DTM_ID}}">{{$type->Name}}</option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
									  <div class="col-sm-8"><input id="DocNo" name="DocNo" type="text" class="form-control"></div>
									</div>
								  </li>
								  
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list-unstyled profile-about margin-none">
								   <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
									  <div class="col-sm-8"><input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Organization Category</span></div>
									  <div class="col-sm-8">
											<select name="OrganizationCategory" id="OrganizationCategory" class="form-control">
												<option>Select</option>
												@foreach($category as $categoryList)
													<option value="{{$categoryList->MOCM_ID}}">{{$categoryList->Name}} </option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Membership No</span></div>
									  <div class="col-sm-8"><input id="MembershipNo" name="MembershipNo" type="text" class="form-control"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Sponceror</span></div>
									  <div class="col-sm-8">
											<select name="Sponceror" id="Sponceror" class="form-control">
												<option>Select</option>
												@foreach($sponceror as $sponcerorList)
													<option value="{{$sponcerorList->MSM_ID}}">{{$sponcerorList->Name}} </option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Facilities</span></div>
									  <div class="col-sm-8"> 
											<select name="Facilities"  class="selectpicker" multiple data-style="btn-white" title='Choose one of the following...'>
												@foreach($facilitiemaster as $facilitie)
													<option value="{{$facilitie->FM_ID}}">{{$facilitie->Name}} </option>
												@endforeach
											</select>
									  </div>
									</div>
								  </li>
								  
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
									  <div class="col-sm-8"><input id="DocImage" name="DocImage" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*" class="form-control"></div>
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
