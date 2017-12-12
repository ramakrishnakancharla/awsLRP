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
						//$name = DB::table('finance_debit_card_master')->where('FDCM_ID',$values->DebitCard)->get();
						if($values->MetaID =='1')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='2')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='3')
							$img = DB::table('addfriendsrelatives')->where('AFR_ID',$values->ToWhom)->get();
					?>
                      <li class="list-group-item">
                        <a href="{{ URL::to('finance-fixed-deposits/' . $values->FFD_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="{{URL::to($img[0]->Folder.$img[0]->Image)}}" width="50" height="48" alt="NO IMAGE"  class="media-object" />
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
                              <span class="user">Debit Card : {{$values->InstitutionName}}</span>
							  <div class="message">From : {{Carbon\Carbon::parse($values->StartDate)->format('d/m/Y')}}</div>
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
                <form class="form-horizontal" role="form" action="{{ URL::to('finance-fixed-deposits') }}" enctype="multipart/form-data" method="post">
					<div class="panel panel-default share">
						<div class="input-group">
						<div class="input-group-btn">
						  <a href="{{ URL::to('finance-fixed-deposits') }}" class="btn btn-primary pointer">Add New</a>
						</div>
						<input type="text" class="form-control share-text allSearch"  placeholder="FIXED DEPOSITS DEATILS" />
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
										  <div class="col-sm-4"><span class="text-muted">FD Start Date</span></div>
										  <div class="col-sm-8"><input name="StartDate" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Institution Name</span></div>
										  <div class="col-sm-8"><input  name="InstitutionName"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Institution Address</span></div>
										  <div class="col-sm-8"><textarea name="InstitutionAddress"  class="form-control"></textarea></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Principal Amount </span></div>
										  <div class="col-sm-8"><input name="PrincipalAmount"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Period Of Deposite  </span></div>
										  <div class="col-sm-8"><input name="PeriodOfDeposit"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Name </span></div>
										  <div class="col-sm-8"><input name="NomineeName"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Contact No </span></div>
										  <div class="col-sm-8"><input name="NomineeContactNumber"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">
												<select name="DocType" class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">FD Matuirity Date</span></div>
										  <div class="col-sm-8"><input name="MatuirityDate" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Institution Type</span></div>
										  <div class="col-sm-8">
												<select name="InstitutionType" required class="form-control">
													<option>Select</option>
													@foreach($institutiontype as $inst)
														<option value="{{$inst->FITM_ID}}">{{$inst->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Receipt No</span></div>
										  <div class="col-sm-8"><input name="ReceiptNo" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Rate Of Interest</span></div>
										  <div class="col-sm-8">
												<select name="RateOfInterest" required class="form-control">
													<option>Select</option>
													@foreach($rateofinterest as $interest)
														<option value="{{$interest->FROIM_ID}}">{{$interest->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Deposite Options</span></div>
										  <div class="col-sm-8">
												<select name="DepositOptions" required class="form-control">
													<option>Select</option>
													@foreach($depositoptions as $deposit)
														<option value="{{$deposit->FDOM_ID}}">{{$deposit->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Relationship</span></div>
										  <div class="col-sm-8">
												<select name="NomineeRelationship" required class="form-control">
													<option>Select</option>
													@foreach($nomineerelation as $nomiee)
														<option value="{{$nomiee->FNRM_ID}}">{{$nomiee->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Address</span></div>
										  <div class="col-sm-8"><textarea name="NomineeAddress" class="form-control"></textarea></div>
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
