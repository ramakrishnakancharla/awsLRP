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
                        <a href="{{ URL::to('general-accesslogin/' . $values->GAL_ID) }}" class="pointer">
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
                              <span class="user">{{$values->Account}}</span>
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
                      <a href="{{ URL::to('general-accesslogin') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="ACCESS LOGIN INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('general-accesslogin/' . $show->GAL_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'general-accesslogin/' . $show->GAL_ID, 'class' => 'pull-right')) }}
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
										  <div class="col-sm-4"><span class="text-muted">Account</span></div>
										  <div class="col-sm-8">{{$show->Account}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">User ID</span></div>
										  <div class="col-sm-8">{{$show->UserID}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nick Name</span></div>
										  <div class="col-sm-8">{{$show->NickName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Password</span></div>
										  <div class="col-sm-8">{{$show->Password}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Phone No</span></div>
										  <div class="col-sm-8">{{$show->PhoneNo}}</div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q1</span></div>
										  <div class="col-sm-8">{{$show->HintQ1}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q2</span></div>
										  <div class="col-sm-8">{{$show->HintQ2}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q3</span></div>
										  <div class="col-sm-8">{{$show->HintQ3}}</div>
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
										  <div class="col-sm-4"><span class="text-muted">Category</span></div>
										  <div class="col-sm-8">{{$NameOfAccessCate->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">URL</span></div>
										  <div class="col-sm-8">{{$show->URL}}</div>
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
										  <div class="col-sm-4"><span class="text-muted">Purpose</span></div>
										  <div class="col-sm-8">{{$show->Purpose}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Notes</span></div>
										  <div class="col-sm-8">{{$show->Notes}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q1 Ans</span></div>
										  <div class="col-sm-8">{{$show->HintQ1Ans}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q2 Ans</span></div>
										  <div class="col-sm-8">{{$show->HintQ2Ans}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hint Q3 Ans</span></div>
										  <div class="col-sm-8">{{$show->HintQ3Ans}}</div>
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
