@extends('layouts.mainapp')

@section('content')

<!-- this is the wrapper for the content -->
<div class="st-content">

  <!-- extra div for emulating position:fixed of the menu -->
  <div class="st-content-inner">

    <div class="container-fluid">
    <h4 class="page-section-heading">PERSONNEL ID's</h4>
    <div class="panel panel-default">
    <div class="panel-body">

      <form class="form-horizontal" role="form" action="{{ route('personaldata') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label for="ValidFromDate" class="col-sm-3 control-label">Valid From Date</label>
              <div class="col-sm-9">
              <input id="ValidFromDate" name="ValidFromDate" type="text" class="form-control datepicker">
              </div>
            </div>
            <div class="form-group">
              <label for="IDType" class="col-sm-3 control-label">ID Type</label>
              <div class="col-sm-9">
              <input id="IDType" name="IDType" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="IDNo" class="col-sm-3 control-label">ID No.</label>
              <div class="col-sm-9">
              <input id="IDNo" name="IDNo" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="PlaceOfIssue" class="col-sm-3 control-label">Place Of Issue</label>
              <div class="col-sm-9">
              <input id="PlaceOfIssue" name="PlaceOfIssue" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="CountryOfIssue" class="col-sm-3 control-label">Country Of Issue</label>
              <div class="col-sm-9">
              <select name="CountryOfIssue" id="CountryOfIssue" class="form-control">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label for="ValidToDate" class="col-sm-3 control-label">Valid To Date</label>
              <div class="col-sm-9">
              <input id="ValidToDate" name="ValidToDate" type="text" class="form-control datepicker">
              </div>
            </div>
            <div class="form-group">
              <label for="Country" class="col-sm-3 control-label">Country</label>
              <div class="col-sm-9">
              <select name="Country" id="Country" class="form-control">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="Region" class="col-sm-3 control-label">Region</label>
              <div class="col-sm-9">
              <select name="Region" id="Region" class="form-control">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="IssueingAuthority" class="col-sm-3 control-label">Issueing Authority</label>
              <div class="col-sm-9">
              <input name="IssueingAuthority" id="IssueingAuthority" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="DateOfIssue" class="col-sm-3 control-label">Date Of Issue</label>
              <div class="col-sm-9">
              <input id="DateOfIssue" name="DateOfIssue" type="text" class="form-control datepicker">
              </div>
            </div>
          </div>
          <div class="form-group margin-none pull-right">
            <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Save Me!</button>
            </div>
          </div>
        </div>
        </form>

      </div>
	  <div class="panel panel-default">
			<!-- Progress table -->
			<div class="table-responsive">
			  <table class="table v-middle">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Name</th>
					<th>Email</th>
					<th>Location</th>
					<th>Progress</th>
					<th class="text-right">Action</th>
				  </tr>
				</thead>
				<tbody id="responsive-table-body">
				@foreach($data as $values)
				  <tr>
					<td><span class="label label-default">{{$values->from_date}}</span></td>
					<td>

					  <img src="images/people/110/guy-5.jpg" width="40" class="img-circle"> Jonathan Smith
					</td>
					<td><a href="#">contact@mosaicpro.biz</a></td>
					<td>Miami, FL<a href="#"><i class="fa fa-map-marker fa-fw text-muted"></i></a></td>
					<td>
					  <div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						</div>
					  </div>
					</td>
					<td class="text-right">
					  <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip" editdata= {{ $values }} data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
					  <a href="{{ route('personaldatadelete')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
					</td>
				  </tr>
               @endforeach
				</tbody>
			  </table>
			</div>
			<!-- // Progress table -->

			<div class="panel-footer padding-none text-center">
			  {{ $data->links() }}
			</div>
		  </div>
      </div>
      </div>
  </div>
  <!-- /st-content-inner -->

</div>
<!-- /st-content -->

@endsection
