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
                      <li class="list-group-item">
                        <a href="{{ URL::to('general-objectsonloan/' . $values->GOL_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="../../images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{$values->ObjectName}}</span>
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
                      <a href="{{ URL::to('general-objectsonloan') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="OBJECTSONLOAN INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('general-objectsonloan/' . $show->GOL_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'general-objectsonloan/' . $show->GOL_ID, 'class' => 'pull-right')) }}
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
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">Choose Option</span></div>
									  <div class="col-sm-8">{{$show->MetaID}}</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
									  <div class="col-sm-4"><span class="text-muted">To Whom?</span></div>
									  <div class="col-sm-8">{{$show->ToWhom}}</div>
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
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->ValidFrom)->format('d/m/Y'}}</div>
										</div>
									  </li>
									 
									 
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Object Name</span></div>
										  <div class="col-sm-8">{{$show->ObjectName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Object Category</span></div>
										  <div class="col-sm-8">{{$show->ObjectCategory}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Given To</span></div>
										  <div class="col-sm-8">{{$show->GivenTo}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Email ID</span></div>
										  <div class="col-sm-8">{{$show->EmailID}}</div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Place Of Issue</span></div>
										  <div class="col-sm-8">{{$show->PlaceOfIssue}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Value Addition</span></div>
										  <div class="col-sm-8">{{$show->ValueAddition}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Given Date</span></div>
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->GivenDate)->format('d/m/Y'}}</div>
										</div>
									  </li>
									  
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">{{$show->DocType}}</div>
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
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->ValidTo)->format('d/m/Y'}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Amount</span></div>
										  <div class="col-sm-8">{{$show->Amount}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Contact No</span></div>
										  <div class="col-sm-8">{{$show->ContactNo}}</div>
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
										  <div class="col-sm-4"><span class="text-muted">Purpose</span></div>
										  <div class="col-sm-8">{{$show->Purpose}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mode Of Giving</span></div>
										  <div class="col-sm-8">{{$show->ModeOfGiving}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mode Of Returning</span></div>
										  <div class="col-sm-8">{{$show->ModeOfReturning}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Date Of Issue</span></div>
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->DateOfIssue)->format('d/m/Y'}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Return Date</span></div>
										  <div class="col-sm-8">{{Carbon\Carbon::parse($show->ReturnDate)->format('d/m/Y'}}</div>
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
								<input id="hiddenid" name="hiddenid" type="hidden" class="form-control">
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
