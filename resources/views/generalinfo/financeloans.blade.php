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
                      <li class="list-group-item generalTravelInfo" attrId="{{$values}}">
                        <a href="#">
                          <div class="media">
                            <div class="media-left">
                              <img src="images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="date">Family</span>
                              <span class="user">{{$values->Purpose}}</span>
                              <div class="message">From Date : {{Carbon\Carbon::parse($values->FromDate)->format('d/m/Y')}}</div>
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
			  <form class="form-horizontal" role="form" action="{{ route('financebankdetails') }}" method="post">
                <div class="panel panel-default share">
                  <div class="input-group row">
                    <div class="input-group-btn">
                      <a class="btn btn-primary pointer">
                        <i class="fa fa-plus"></i> <input class="btn-primary bordernone resetAll" type="reset" value="Add New"  />
                      </a>
                    </div>
                    <input type="text" class="form-control share-text" placeholder="financefinancialdocuments" />
					<div class="input-group-btn">
                      <a href="#" class="btn btn-warning pointer actionBtn editAll"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger pointer actionBtn"><i class="fa fa-trash"></i></a>
                    </div>
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
										  <div class="col-sm-4"><span class="text-muted">From Date</span></div>
										  <div class="col-sm-8"><input id="FromDate" name="FromDate" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Type Of Loan</span></div>
										  <div class="col-sm-8">
												<select name="TypeOfLoan" class="form-control">
													<option>Select</option>
													<option value="India">India</option>
													<option value="UK">UK</option>
													<option value="USA">USA</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Related To Asset (Outside List)</span></div>
										  <div class="col-sm-8">
												<select name="RelatedToAssetOutsideList" class="form-control">
													<option>Select</option>
													<option value="India">India</option>
													<option value="UK">UK</option>
													<option value="USA">USA</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Loan Approved Date</span></div>
										  <div class="col-sm-8"><input  name="LoanApprovedDate"  class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Loan Amount</span></div>
										  <div class="col-sm-8"><input name="LoanAmount"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Rate Of Interest </span></div>
										  <div class="col-sm-8"><input name="RateOfInterest"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Installement Start Date </span></div>
										  <div class="col-sm-8"><input name="InstallementStartDate"  class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Installement Last Date </span></div>
										  <div class="col-sm-8"><input name="InstallementLastDate"  class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Additional Installement Payment Amount</span></div>
										  <div class="col-sm-8"><input name="AdditionalInstallementPaymentAmount"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Surity/Guarentee Person Relationship</span></div>
										  <div class="col-sm-8">
												<select name="SurityGuarenteePersonRelationship" class="form-control">
													<option>Select</option>
													<option value="PAN">PAN</option>
													<option value="PassPort">PassPort</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Surity/Guarentee Person Address</span></div>
										  <div class="col-sm-8"><input name="SurityGuarenteePersonAddress"  class="form-control"></div>
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
										  <div class="col-sm-4"><span class="text-muted">To Date</span></div>
										  <div class="col-sm-8"><input id="ToDate" name="ToDate" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Related to Asset (From List)</span></div>
										  <div class="col-sm-8">
												<select name="RelatedToAssetFromList" class="form-control">
													<option>Select</option>
													<option value="Hindu">Hindu</option>
												</select>
										  </div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Loan Amount Received Date</span></div>
										  <div class="col-sm-8"><input name="LoanAmountReceivedDate" type="text" class="form-control datepicker"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Period (Years - Months)</span></div>
										  <div class="col-sm-8"><input name="PeriodYearsMonths" type="text" class="form-control"></div>
										</div>
									  </li>
		
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Installement Amount</span></div>
										  <div class="col-sm-8"><input name="InstallementAmount" type="text" class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">No Of Installements</span></div>
										  <div class="col-sm-8"><input name="NoOfInstallements"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Loan Balance</span></div>
										  <div class="col-sm-8"><input name="LoanBalance"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Surity/Guarentee Person Name</span></div>
										  <div class="col-sm-8"><input name="SurityGuarenteePersonName"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Surity/Guarentee Person Contact No</span></div>
										  <div class="col-sm-8"><input name="SurityGuarenteePersonContactNo"  class="form-control"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Insured?</span></div>
										  <div class="col-sm-8"><input name="Insured" type="checkbox"></div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Insurance Policy No</span></div>
										  <div class="col-sm-8">
												<select name="InsurancePolicyNo" class="form-control">
													<option>Select</option>
													<option value="PAN">PAN</option>
													<option value="PassPort">PassPort</option>
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
													<option value="PAN">PAN</option>
													<option value="PassPort">PassPort</option>
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
