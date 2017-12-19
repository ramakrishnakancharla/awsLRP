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
					<?php //$name = DB::table('finance_debit_card_master')->where('FDCM_ID',$values->DebitCard)->get(); 
						if($values->MetaID =='1')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='2')
							$img = DB::table('addfamilymembers')->where('AFM_ID',$values->ToWhom)->get();
						if($values->MetaID =='3')
							$img = DB::table('addfriendsrelatives')->where('AFR_ID',$values->ToWhom)->get();
					?>
                      <li class="list-group-item">
                        <a href="{{ URL::to('finance-asset/' . $values->FA_ID) }}" class="pointer">
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
                              <span class="user">Debit Card : {{$values->AssetName}}</span>
							  <div class="message">From : {{Carbon\Carbon::parse($values->FromDate)->format('d/m/Y')}}</div>
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
				{{ Form::model($edit, array('action' => array('finance\FinanceAssetController@update', $edit->FA_ID), 'method' => 'PUT', 'files' => true)) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('finance-asset') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="ASSETS DEPOSITS" />
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
										  <div class="col-sm-4"><span class="text-muted">From Date</span></div>
										  <div class="col-sm-8"><input name="FromDate" type="text" value="{{Carbon\Carbon::parse($edit->FromDate)->format('d/m/Y')}}" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Asset Name</span></div>
										  <div class="col-sm-8"><input name="AssetName" value="{{$edit->AssetName}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Asset No</span></div>
										  <div class="col-sm-8"><input name="AssetNo" value="{{$edit->AssetNo}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Ownership</span></div>
										  <div class="col-sm-8">
												<select name="Ownership" class="form-control">
													<option>Select</option>
													@foreach($ownership as $owner)
														<option {{$edit->Ownership == $owner->FOM_ID ? 'selected="selected"' : ''}} value="{{$owner->FOM_ID}}">{{$owner->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Insured?</span></div>
										  <div class="col-sm-8"><input name="Insured" value="{{$edit->Insured}}" type="checkbox"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Depreciation</span></div>
										  <div class="col-sm-8"><input name="Depreciation" value="{{$edit->Depreciation}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Vendor Contact No</span></div>
										  <div class="col-sm-8"><input name="VendorContactNo" value="{{$edit->VendorContactNo}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Vendor Address</span></div>
										  <div class="col-sm-8"><textarea name="VendorAddress"  class="form-control">{{$edit->VendorAddress}}</textarea></div>
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
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">To Date</span></div>
										  <div class="col-sm-8"><input name="ToDate" type="text" value="{{Carbon\Carbon::parse($edit->ToDate)->format('d/m/Y')}}" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Asset Identifier</span></div>
										  <div class="col-sm-8"><input name="AssetIdentifier" value="{{$edit->AssetIdentifier}}" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Asset Type</span></div>
										  <div class="col-sm-8">
												<select name="AssetType" class="form-control">
													<option>Select</option>
													@foreach($assettype as $asset)
														<option {{$edit->AssetType == $asset->FATM_ID ? 'selected="selected"' : ''}} value="{{$asset->FATM_ID}}">{{$asset->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Financing Option</span></div>
										  <div class="col-sm-8">
												<select name="FinancingOption"  class="form-control">
													<option>Select</option>
													@foreach($financingoption as $financing)
														<option {{$edit->FinancingOption == $financing->FFOM_ID ? 'selected="selected"' : ''}} value="{{$financing->FFOM_ID}}">{{$financing->Name}}</option>
													@endforeach
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Insurance Policy No</span></div>
										  <div class="col-sm-8"><input name="InsurancePolicyNo" value="{{$edit->InsurancePolicyNo}}" class="form-control">
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Vendor Name</span></div>
										  <div class="col-sm-8"><input name="VendorName" value="{{$edit->VendorName}}" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Vendor Email ID</span></div>
										  <div class="col-sm-8"><input name="VendorEmailID" value="{{$edit->VendorEmailID}}" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
										  <div class="col-sm-8"><input name="DocNo" value="{{$edit->DocNo}}" type="text" class="form-control"></div>
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
