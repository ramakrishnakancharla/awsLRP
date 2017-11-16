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
					<?php $img = DB::table('addfriendsrelatives')->where('AFR_ID',$values->AFR_ID)->get();?>
                      <li class="list-group-item" title="{{$values->FirstName." ".$values->MiddleName." ".$values->LastName}}">
                        <a href="{{ URL::to('genericinfofriends/' . $values->AFR_ID) }}" class="pointer">
                          <div class="media">
                            <div class="media-left">
                               <img src="{{URL::to($img[0]->Folder.$img[0]->Image)}}" width="50" height="48" alt="NO IMAGE" class="media-object" />
                            </div>
                            <div class="media-body">
                              <span class="user">{{str_limit($values->FirstName." ".$values->MiddleName." ".$values->LastName,18)}}</span>
                              <div class="message">DOB : {{Carbon\Carbon::parse($values->DOB)->format('d/m/Y')}}</div>
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
                      <a href="{{ URL::to('genericinfofriends') }}" class="btn btn-primary pointer">Add New</a>
                    </div>
                    <input type="text" class="form-control share-text allSearch"  placeholder="FRIENDS & RELATIVE INFORMATION" />
					<div class="input-group-btn">
                      <a href="{{ URL::to('genericinfofriends/' . $view->AFR_ID . '/edit') }}" class="btn btn-warning pointer">Edit</a>
					  {{ Form::open(array('url' => 'genericinfofriends/' . $view->AFR_ID, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
                    </div>
                  </div>
                </div>
				{{ csrf_field() }}
					<div class="panel panel-default">
						  <div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Title</span></div>
										  <div class="col-sm-8">: @if(count($NameOfTitile) > 0){{$NameOfTitile->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">First Name</span></div>
										  <div class="col-sm-8">: {{$view->FirstName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Middle Name</span></div>
										  <div class="col-sm-8">: {{$view->MiddleName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Last Name</span></div>
										  <div class="col-sm-8">: {{$view->LastName}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
										  <div class="col-sm-8">: @if(count($NameOfGender) > 0) {{$NameOfGender->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">DOB</span></div>
										  <div class="col-sm-8">: {{Carbon\Carbon::parse($view->DOB)->format('d/m/Y')}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Mobile Number</span></div>
										  <div class="col-sm-8">: {{$view->MobileNo}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Profile Image</span></div>
										  <div class="col-sm-8"><img src="{{ URL::to($view->Folder.$view->Image) }}" class="img-responsive"></div>
										</div>
									  </li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled profile-about margin-none">
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Age</span></div>
										  <div class="col-sm-8">: {{$view->Age}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Relationship</span></div>
										  <div class="col-sm-8">: @if(count($NameOfRelation) > 0) {{$NameOfRelation->value}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Nationality</span></div>
										  <div class="col-sm-8">: @if(count($NameOfNationality) > 0) {{$NameOfNationality->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Religion</span></div>
										  <div class="col-sm-8">: @if(count($NameOfReligion) > 0) {{$NameOfReligion->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Marital Status</span></div>
										  <div class="col-sm-8">: @if(count($NameOfMarital) > 0) {{$NameOfMarital->Name}} @endif</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">Married Since</span></div>
										  <div class="col-sm-8">: {{Carbon\Carbon::parse($view->MarriedSince)->format('d/m/Y')}}</div>
										</div>
									  </li>
									  <li class="padding-v-5">
										<div class="row">
										  <div class="col-sm-4"><span class="text-muted">NO. Of Childrens</span></div>
										  <div class="col-sm-8">: {{$view->NoOfChildrens}}</div>
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
