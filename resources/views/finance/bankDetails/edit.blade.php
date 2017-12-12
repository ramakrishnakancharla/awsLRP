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
					<?php $name = DB::table('finance_debit_card_master')->where('FDCM_ID',$values->DebitCard)->get(); 
						if($values->MetaID =='1')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='2')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='3')
							$img = DB::table('addfriendsrelatives')->where('AFR_ID',$values->ToWhom)->get();
					?>
                      <li class="list-group-item">
                        <a href="{{ URL::to('finance-bank-details/' . $values->FBD_ID) }}" class="pointer">
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
                              <span class="user">Debit Card : {{$name[0]->Name}}</span>
							  <div class="message">From : {{Carbon\Carbon::parse($values->ValidFrom)->format('d/m/Y')}}</div>
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
				{{ Form::model($edit, array('action' => array('finance\FinanceBankController@update', $edit->FBD_ID), 'method' => 'PUT', 'files' => true)) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('finance-bank-details') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="COMMUNICATION INFORMATION" />
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
										  <div class="col-sm-8"><input name="ValidFrom" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidFrom)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Country</span></div>
										  <div class="col-sm-8">
												<select name="Country" class="form-control">
													<option>Select</option>
													@foreach($countrymaster as $country)
														<option {{$edit->Country == $country->CM_ID ? 'selected="selected"' : ''}} value="{{$country->CM_ID}}">{{$country->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Payee Name</span></div>
										  <div class="col-sm-8"><input name="PayeeName" value="{{$edit->PayeeName}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Bank Account No.</span></div>
										  <div class="col-sm-8"><input name="BankAccountNo" value="{{$edit->BankAccountNo}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Cheque Book</span></div>
										  <div class="col-sm-8">
												<select name="ChequeBook" class="form-control">
													<option>Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Credit Card(s)</span></div>
										  <div class="col-sm-8">
												<select name="CreditCard" class="form-control">
													<option>Select</option>
													@foreach($creditcard as $credit)
														<option {{$edit->CreditCard == $credit->FCCM_ID ? 'selected="selected"' : ''}} value="{{$credit->FCCM_ID}}">{{$credit->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Relationship</span></div>
										  <div class="col-sm-8">
												<select name="NomineeRelationship" class="form-control">
													<option>Select</option>
													@foreach($nomineerelation as $nomiee)
														<option {{$edit->NomineeRelationship == $nomiee->FNRM_ID ? 'selected="selected"' : ''}} value="{{$nomiee->FNRM_ID}}">{{$nomiee->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Address </span></div>
										  <div class="col-sm-8"><textarea name="NomineeAddress" class="form-control">{{$edit->NomineeAddress}}</textarea></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
										  <div class="col-sm-8"><input name="DocNo" type="text" value="{{$edit->IssueingAuthority}}" class="form-control"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
										  <div class="col-sm-8"><input  name="ValidTo" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidTo)->format('d/m/Y')}}"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Region</span></div>
										  <div class="col-sm-8">
												<select name="Region" class="form-control">
													<option>Select</option>
													@foreach($religionmaster as $religion)
														<option {{$edit->Region == $religion->RM_ID ? 'selected="selected"' : ''}} value="{{$religion->RM_ID}}">{{$religion->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Address</span></div>
										  <div class="col-sm-8"><textarea name="Address"  class="form-control">{{$edit->Address}}</textarea></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">IBAN</span></div>
										  <div class="col-sm-8">
												<input name="IBAN" type="text" value="{{$edit->IBAN}}" class="form-control">
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Debit Card(s)</span></div>
										  <div class="col-sm-8">
											<select name="DebitCard" class="form-control">
												<option>Select</option>
													@foreach($debitcard as $debit)
														<option {{$edit->DebitCard == $debit->FDCM_ID ? 'selected="selected"' : ''}} value="{{$debit->FDCM_ID}}">{{$debit->Name}}</option>
													@endforeach
											</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Name</span></div>
										  <div class="col-sm-8"><input name="NomineeName" value="{{$edit->NomineeName}}" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Contact Number</span></div>
										  <div class="col-sm-8"><input name="NomineeContactNumber" value="{{$edit->NomineeContactNumber}}" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">
												<select name="DocType" class="form-control">
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
										  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
										  <div class="col-sm-6"><input id="DocImage" name="DocImage" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*" class="form-control"><input name="PhotoEdit" type="hidden" value="{{$edit->DocImage}}"></div>
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
