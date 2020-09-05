@extends('layouts.main')

@section('title')
    {{ "Upload New Messenger" }}
@endsection

@section('styles')
    <!-- Bootstrap Select Css -->
    <link href="/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">

		@include('includes.alert')
		
		<br>
		<div class="row clearfix">
			<div class="col-md-12">
				<a href="#addYear" class="btn btn-raised btn-primary"
					data-toggle="modal">
					<strong>
						Add New Year
					</strong>
				</a>
			</div>
		</div>
		<br>

        <div class="block-header">
            <h2>MANAGE DIARY YEARS </h2>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Diary Years</h2>
                    </div>
                    <div class="body">
                        
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Year</th>
                                        <th>Name</th>
                                        <th>Available</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ( $diaryYears as $year)
                                        <tr>
                                            <td>
                                                {{ $count++ }}
                                            </td>
                                            <td>
                                                {{ $year->year }}
                                            </td>
                                            <td>
                                                {{ "Church Diary " . $year->year }}
                                            </td>
                                            <td>
                                                @if($year->is_available)
                                                    <strong class="text-success">
                                                        <i class="material-icons">done</i>
                                                    </strong>
                                                @else 
                                                    <strong class="text-danger">
                                                        <i class="material-icons">clear</i>
                                                    </strong>
                                                @endif
                                            </td>
                                            <td>
												@if($year->is_available)
													<a href="" target="_blank"
														class="btn btn-danger waves-effect"
														title="Make Year Unavailable">
														<i class="material-icons">clear</i>
													</a>
												@else 
													<a href="" target="_blank"
														class="btn btn-success waves-effect"
														title="Make Year Available">
														<i class="material-icons">done</i>
													</a>
												@endif
                                                <a href="" target="_blank"
                                                    class="btn btn-primary waves-effect"
                                                    title="View Diary">
                                                    <i class="material-icons">forward</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            
            <!-- #END# Browser Usage -->
        </div>

	</div>
	
	{{-- modal for the add new Year --}}
	<form action="{{ route("diary.store") }}" class="form-horizontal" method="POST">
		@csrf 

		<div class="modal fade" id="addYear" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="defaultModalLabel">Add New Church Diary Year</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="NameSurname" class="col-sm-4 control-label">Enter Year:</label>
							<div class="col-sm-8">
								<div class="form-line">
									<input type="text" class="form-control" id="year" name="year" 
										placeholder="Enter the year for the diary" required>
								</div>
							</div>
						</div>
						<br>

						<div class="form-group">
							<label for="telephone" class="col-sm-4 control-label">Is Available: </label>

							<div class="col-sm-8">
								<div class="">
									<div class="switch">
										<label>OFF<input type="checkbox" name="is_available" checked><span class="lever"></span>ON</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-link waves-effect">ADD YEAR</button>
						<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection