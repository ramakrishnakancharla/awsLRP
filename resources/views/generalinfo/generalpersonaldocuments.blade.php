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
					@foreach($data as $key=>$values)
                      <li class="list-group-item generalPersonalDocuments" attrId="{{$values}}">
                        <a href="#">
                          <div class="media">
                            <div class="media-left">
                              <img src="images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="date">Family</span>
                              <span class="user">{{$values->IDType}}</span>
                              <div class="message">Date Of Issue : {{Carbon\Carbon::parse($values->DateOfIssue)->format('d/m/Y')}}</div>
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
			  <form class="form-horizontal" role="form" action="{{ route('generalpersonaldocuments') }}" method="post">
                <div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a class="btn btn-primary pointer">
                        <i class="fa fa-plus"></i> <input class="btn-primary bordernone" type="reset" value="Add New"  />
                      </a>
                    </div>
                    <input type="text" class="form-control share-text" readonly placeholder="PERSONAL DOCUMENTS" />
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
										  <div class="col-sm-4"><span class="text-muted">Doc. Category</span></div>
										  <div class="col-sm-8">
											<select name="IDType" id="IDType" class="form-control">
												<option>Select</option>
												<option value="PAN">PAN</option>
												<option value="Passport">Passport</option>
											</select>
										  </div>
										</div>
									  </li>
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Belongs To</span></div>
										  <div class="col-sm-8"><input id="BelongsTo" name="BelongsTo" type="text" class="form-control"></div>
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
										  <div class="col-sm-4"><span class="text-muted">Doc. Name</span></div>
										  <div class="col-sm-8"><input id="IssueingAuthority" name="IssueingAuthority" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Doc. Name</span></div>
										  <div class="col-sm-8"><input id="IssueingAuthority" name="IssueingAuthority" type="text" class="form-control"></div>
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
