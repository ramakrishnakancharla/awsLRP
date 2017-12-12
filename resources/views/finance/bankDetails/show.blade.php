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
                <form class="form-horizontal" role="form" action="#" method="post">
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('finance-bank-details') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="COMMUNICATION INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('finance-bank-details/' . $show->FBD_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'finance-bank-details/' . $show->FBD_ID, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
                    </div>
                  </div>
                </div>
				{{ csrf_field() }}
				<div class="panel panel-default">
				  <div class="panel-heading panel-heading-gray">
					<div class="row">
						<div class="col-lg-12">
									<div class="row">
									  <div class="col-sm-12"> 
									  @if($NameOfMetadata->value =='Self')
										  {{Auth::user()->name}} - ( {{$NameOfMetadata->value}} )
									  @elseif($NameOfMetadata->value =='Family Member')
										  {{$NameOfFamily->FirstName." ".$NameOfFamily->MiddleName." ".$NameOfFamily->LastName}} - ( {{$NameOfMetadata->value}} )
									  @elseif($NameOfMetadata->value =='Relatives & Friends')
										  {{$NameOfFriend->FirstName." ".$NameOfFriend->MiddleName." ".$NameOfFriend->LastName}} - ( {{$NameOfMetadata->value}} )
									  @endif
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
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->ValidFrom)->format('d/m/Y')}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Country</span></div>
										  <div class="col-sm-8">@if(count($NameOfCountry) > 0) {{$NameOfCountry->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Payee Name</span></div>
										  <div class="col-sm-8">{{$show->PayeeName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Bank Account No.</span></div>
										  <div class="col-sm-8">{{$show->BankAccountNo}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Cheque Book</span></div>
										  <div class="col-sm-8">{{$show->ChequeBook}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Credit Card(s)</span></div>
										  <div class="col-sm-8">@if(count($NameOfCredit) > 0) {{$NameOfCredit->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Relationship</span></div>
										  <div class="col-sm-8">@if(count($NameOfNomineeRelation) > 0) {{$NameOfNomineeRelation->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Address </span></div>
										  <div class="col-sm-8">{{$show->NomineeAddress}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Doc. Name / No.</span></div>
										  <div class="col-sm-8">{{$show->DocNo}}</div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									   <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->ValidTo)->format('d/m/Y')}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Region</span></div>
										  <div class="col-sm-8">@if(count($NameOfReligion) > 0) {{$NameOfReligion->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Address</span></div>
										  <div class="col-sm-8">{{$show->Address}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">IBAN</span></div>
										  <div class="col-sm-8">{{$show->IBAN}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Debit Card(s)</span></div>
										  <div class="col-sm-8">@if(count($NameOfDebit) > 0) {{$NameOfDebit->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Name</span></div>
										  <div class="col-sm-8">{{$show->NomineeName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nominee Contact Number</span></div>
										  <div class="col-sm-8">{{$show->NomineeContactNumber}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">@if(count($NameOfDocType) > 0) {{$NameOfDocType->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
										  <div class="col-sm-8"><img src="{{ URL::to($show->Folder.$show->DocImage) }}" class="img-responsive"></div>
										</div>
									  </li>
									</ul>
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
