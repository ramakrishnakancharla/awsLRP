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
                        <a href="{{ URL::to('general-memberships/' . $values->GMS_ID) }}" class="pointer">
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
                <form class="form-horizontal" role="form" action="#" method="post">
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('general-memberships') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="MEMBERSHIP INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('general-memberships/' . $show->GMS_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'general-memberships/' . $show->GMS_ID, 'class' => 'pull-right')) }}
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
										  <div class="col-sm-4"><span class="text-muted">Organization Name</span></div>
										  <div class="col-sm-8">{{$show->OrganizationName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Membership Type</span></div>
										  <div class="col-sm-8">{{$NameOfMemType->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Membership Fees</span></div>
										  <div class="col-sm-8">{{$show->MembershipFees}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Allowed For Members</span></div>
										  <div class="col-sm-8">{{$NameOfMemAllow->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Document Type</span></div>
										  <div class="col-sm-8">{{$NameOfDocType->Name}}</div>
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
										  <div class="col-sm-4"><span class="text-muted">Organization Category</span></div>
										  <div class="col-sm-8">{{$NameOfMemOrg->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Membership No</span></div>
										  <div class="col-sm-8">{{$show->MembershipNo}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Sponceror</span></div>
										  <div class="col-sm-8">{{$show->Sponceror}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Facilities</span></div>
										  <div class="col-sm-8"> {{$show->Facilities}}</div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Supported Document</span></div>
										  <div class="col-sm-8"><img src="{{ URL::to($show->Folder.$show->DocImage) }}" class="image50x50 img-responsive"></div>
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
