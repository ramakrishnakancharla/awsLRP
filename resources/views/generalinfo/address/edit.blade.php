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
                        <a href="{{ URL::to('general-address/' . $values->GA_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="../../images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{$values->AddressType}}</span>
                              <div class="message">City : {{$values->City}}</div>
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
				{{ Form::model($edit, array('action' => array('general\AddressController@update', $edit->GA_ID), 'method' => 'PUT')) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('general-address') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="PERSONAL INFORMATION" />
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
											<option {{$edit->MetaID == $meta->id ? 'selected="selected"' : ''}}  value="{{$meta->id}}">{{$meta->value}}</option>
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
											<option {{$edit->MetaID == $family->AFM_ID ? 'selected="selected"' : ''}}   value="{{$family->AFM_ID}}">{{$family->FirstName}} {{$family->MiddleName}} {{$family->LastName}}</option>
										@endforeach
									</select>
									<select name="FriendsId" id="FriendsId" class="form-control">
										@foreach($genericfriends as $friends)
											<option {{$edit->MetaID == $friends->AFR_ID ? 'selected="selected"' : ''}}  value="{{$friends->AFR_ID}}">{{$friends->FirstName}} {{$friends->MiddleName}} {{$friends->LastName}}</option>
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
									  <div class="col-sm-8"><input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker" value="{{$edit->ValidFrom}}"></div>
									</div>
								  </li>
								 
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Address Type</span></div>
									  <div class="col-sm-8"><input id="AddressType" name="AddressType" type="text" class="form-control"  value="{{$edit->AddressType}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Street</span></div>
									  <div class="col-sm-8"><input id="Street" name="Street" type="text" class="form-control"  value="{{$edit->Street}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Postal Code</span></div>
									  <div class="col-sm-8"><input id="PostalCode" name="PostalCode" type="text" class="form-control"  value="{{$edit->PostalCode}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Geographical Address</span></div>
									  <div class="col-sm-8"><input id="GeographicalAddress" name="GeographicalAddress" type="text" class="form-control"  value="{{$edit->GeographicalAddress}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
									  <div class="col-sm-8">
											<select name="DocType" id="DocType" class="form-control">
												<option>Select</option>
												<option value="1">PAN</option>
												<option value="2">PassPort</option>
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
									  <div class="col-sm-8"><input id="DocNo" name="DocNo" type="text" class="form-control"  value="{{$edit->MetaID}}"></div>
									</div>
								  </li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list-unstyled profile-about margin-none">
								   <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
									  <div class="col-sm-8"><input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker" value="{{$edit->ValidTo}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">House No.</span></div>
									  <div class="col-sm-8"><input id="HouseNo" name="HouseNo" type="text" class="form-control" value="{{$edit->HouseNo}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">2nd Address Line</span></div>
									  <div class="col-sm-8"><input id="AddressLine" name="AddressLine" type="text" class="form-control" value="{{$edit->AddressLine}}"></div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Country</span></div>
									  <div class="col-sm-8">
										<select name="Country" id="Country" class="form-control">
											<option>Select</option>
											<option value="1">India</option>
											<option value="2">USA</option>
											<option value="3">UK</option>
										</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">City</span></div>
									  <div class="col-sm-8">
											<select name="City" id="City" class="form-control">
												<option>Select</option>
												<option value="1">Bangalore</option>
												<option value="2">Hyderabad</option>
											</select>
									  </div>
									</div>
								  </li>
								  <li class="padding-v-5">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
									  <div class="col-sm-8"><input id="DocImage" name="DocImage" type="file" class="form-control"></div>
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
