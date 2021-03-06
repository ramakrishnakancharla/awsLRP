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
					<?php $name = DB::table('common_objects_loan_master')->where('OLM_ID',$values->ObjectCategory)->get(); ?>
                      <li class="list-group-item">
                        <a href="{{ URL::to('general-objectsonloan/' . $values->GOL_ID) }}" class="pointer">
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
                             <span class="user">{{$name[0]->Name}}</span>
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
				{{ Form::model($edit, array('action' => array('general\ObjectsonloanController@update', $edit->GOL_ID), 'method' => 'PUT', 'files' => true)) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('general-objectsonloan') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="OBJECTSONLOAN INFORMATION" />
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
										  <div class="col-sm-8"><input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidFrom)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									 
									 
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Object Name</span></div>
										  <div class="col-sm-8"><input id="ObjectName" name="ObjectName" type="text" class="form-control" value="{{$edit->ObjectName}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Object Category</span></div>
										  <div class="col-sm-8">
												<select name="ObjectCategory" id="ObjectCategory" class="form-control">
													@foreach($objectsloanmaster as $objectCat)
														<option {{$edit->ObjectCategory == $objectCat->OLM_ID ? 'selected="selected"' : ''}} value="{{$objectCat->OLM_ID}}">{{$objectCat->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Given To</span></div>
										  <div class="col-sm-8"><input id="GivenTo" name="GivenTo" type="text" class="form-control" value="{{$edit->GivenTo}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Email ID</span></div>
										  <div class="col-sm-8"><input id="EmailID" name="EmailID" type="text" class="form-control" value="{{$edit->EmailID}}"></div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Place Of Issue</span></div>
										  <div class="col-sm-8"><input id="PlaceOfIssue" name="PlaceOfIssue" type="text" class="form-control" value="{{$edit->PlaceOfIssue}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Value Addition</span></div>
										  <div class="col-sm-8"><input id="ValueAddition" name="ValueAddition" type="text" class="form-control" value="{{$edit->ValueAddition}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Given Date</span></div>
										  <div class="col-sm-8"><input id="GivenDate" name="GivenDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->GivenDate)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">
												<select name="DocType" id="DocType" class="form-control">
													<option>Select</option>
													@foreach($documenttype as $type)
													<option {{$edit->DocType == $type->DTM_ID ? 'selected="selected"' : ''}} value="{{$type->DTM_ID}}">{{$type->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
										  <div class="col-sm-8"><input id="DocNo" name="DocNo" type="text" class="form-control" value="{{$edit->DocNo}}"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
										  <div class="col-sm-8"><input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidTo)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Amount</span></div>
										  <div class="col-sm-8"><input id="Amount" name="Amount" type="text" class="form-control" value="{{$edit->Amount}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Contact No</span></div>
										  <div class="col-sm-8"><input id="ContactNo" name="ContactNo" type="text" class="form-control" value="{{$edit->ContactNo}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Address</span></div>
										  <div class="col-sm-8"><textarea id="Address" name="Address"  class="form-control">{{$edit->Address}}</textarea></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Purpose</span></div>
										  <div class="col-sm-8"><input id="Purpose" name="Purpose" type="text" class="form-control" value="{{$edit->Purpose}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mode Of Giving</span></div>
										  <div class="col-sm-8"><input id="ModeOfGiving" name="ModeOfGiving" type="text" class="form-control" value="{{$edit->ModeOfGiving}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mode Of Returning</span></div>
										  <div class="col-sm-8"><input id="ModeOfReturning" name="ModeOfReturning" type="text" class="form-control" value="{{$edit->ModeOfReturning}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Date Of Issue</span></div>
										  <div class="col-sm-8"><input id="DateOfIssue" name="DateOfIssue" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->DateOfIssue)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Return Date</span></div>
										  <div class="col-sm-8"><input id="ReturnDate" name="ReturnDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ReturnDate)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
										  <div class="col-sm-6"><input id="DocImage" name="DocImage" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*" class="form-control"></div>
										  <div class="col-sm-2"><img src="{{ URL::to($edit->Folder.$edit->DocImage) }}" class="image50x50 img-responsive"></div>
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
