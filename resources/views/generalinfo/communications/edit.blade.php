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
                      <li class="list-group-item">
                        <a href="{{ URL::to('general-communications/' . $values->GC_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                              <img src="../../images/people/110/woman-5.jpg" width="50" alt="" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{$values->CommunicationType}}</span>
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
				{{ Form::model($edit, array('action' => array('general\CommunicationsController@update', $edit->GC_ID), 'method' => 'PUT')) }}
				<div class="panel panel-default share">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a href="{{ URL::to('general-communications') }}" class="btn btn-primary pointer">Add New</a>
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
								  <div class="col-sm-8"><input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidFrom)->format('d/m/Y')}}"></div>
								</div>
							  </li>
							 
							  <li class="padding-v-5">
								<div class="row">
								  <div class="col-sm-4"><span class="text-muted">Communication Type</span></div>
								  <div class="col-sm-8">
										<select name="CommunicationType"  class="form-control">
											@foreach($communicationmaster as $communication)
												<option {{$edit->CommunicationType == $communication->COM_ID ? 'selected="selected"' : ''}} value="{{$communication->COM_ID}}">{{$communication->Name}}</option>
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
								  <div class="col-sm-4"><span class="text-muted">Valid To</span></div>
								  <div class="col-sm-8"><input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker" value="{{Carbon\Carbon::parse($edit->ValidTo)->format('d/m/Y')}}"></div>
								</div>
							  </li>
							  <li class="padding-v-5">
								<div class="row">
								  <div class="col-sm-4"><span class="text-muted">Details</span></div>
								  <div class="col-sm-8"><textarea id="Details" name="Details"  class="form-control">{{$edit->Details}}</textarea></div>
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
