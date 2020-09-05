@extends('layouts.main')

@section('title')
    {{ "Upload Diary Content" }}
@endsection

@section('content')
    <div class="container-fluid">

		@include('includes.alert')
		
		<br>
		<form action="{{ route('diary.upload', ['year' => $diaryYear->year]) }}" method="POST"
			enctype="multipart/form-data">
			@csrf
			<div class="row clearfix">
				<div class="col-md-3">
					<input type="file" name="diary" class="form-control" required>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-raised btn-primary"
						data-toggle="modal">
						<strong>
							Upload Content
						</strong>
					</button>
				</div>
			</div>
		</form>
		<br>

		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('diary.manage.years') }}" class="btn btn-raised btn-primary"
						data-toggle="modal">
						<strong>
							<i class="material-icons">keyboard_backspace</i>
							Back to Years
						</strong>
					</a>
			</div>
		</div>
		<br>


        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
						<h2>
							Church Diary ({{ $diaryYear->year }})
							&nbsp; &nbsp;
							@if($diaryYear->is_available)
								<span class="badge bg-green">AVAILABLE</span>
							@else 
								<span class="badge bg-pink">UNAVAILABLE</span>
							@endif
						</h2>
						
						
                    </div>
                    <div class="body">
                        
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Date</th>
										<th>Introit Psalms</th>
                                        <th>1st Lesson</th>
                                        <th>2nd Lesson</th>
										<th>Text</th>
										<th>Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
										$count = 1;
									@endphp

									@foreach ($readings as $reading)
										<tr>
											<td>{{ $count++ }}</td>
											<td>{{ $reading->date }}</td>
											<td>{{ $reading->psalms }}</td>
											<td>{{ $reading->reading_one }}</td>
											<td>{{ $reading->reading_two }}</td>
											<td>{{ $reading->reading_text }}</td>
											<td>{{ $reading->name }}</td>
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
	
	
@endsection