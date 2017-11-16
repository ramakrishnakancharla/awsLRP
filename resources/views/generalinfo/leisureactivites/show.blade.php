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
                        <a href="{{ URL::to('general-leisureactivites/' . $values->GLA_ID) }}" class="pointer">
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
                              <span class="user">{{$values->Activity}}</span>
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
                      <a href="{{ URL::to('general-leisureactivites') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="LEISURE ACTIVITES INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('general-leisureactivites/' . $show->GLA_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'general-leisureactivites/' . $show->GLA_ID, 'class' => 'pull-right')) }}
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
										  <div class="col-sm-4"><span class="text-muted">Activity</span></div>
										  <div class="col-sm-8">{{$show->Activity}}</div>
										</div>
									  </li>
									  
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Proficiency</span></div>
										  <div class="col-sm-8">{{$NameOfProciency->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Skills</span></div>
										  <div class="col-sm-8">{{$show->Skills}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Hobby</span></div>
										  <div class="col-sm-8">{{$show->Hobby}}</div>
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
										  <div class="col-sm-4"><span class="text-muted">Activity Type</span></div>
										  <div class="col-sm-8">{{$NameOfAct->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Skills Acquired</span></div>
										  <div class="col-sm-8">{{$NameOfSkill->Name}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Guide/Mentor/Couch</span></div>
										  <div class="col-sm-8">{{$show->GuideMentorCouch}}</div>
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
