@extends('layouts.main')

@section('title')
    {{ "All Messengers" }}
@endsection

@section('content')

    <div class="container-fluid">

        @include('includes.alert')

        <div class="block-header">
            <h2>THE MESSENGER</h2>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>All Messengers</h2>
                    </div>
                    <div class="body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="1" colspan="1">S/N</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Visible</th>
                                        <th rowspan="1" colspan="1">Upload Date</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">S/N</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Visible</th>
                                        <th rowspan="1" colspan="1">Upload Date</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                </tfoot>
        
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
        
                                    @foreach ($messengers as $messenger )
                                        <tr>
                                            <td>
                                                {{ $count++ }}
                                            </td>
                                            <td>
                                                {{ $messenger->name }}
                                            </td>
                                            <td>
                                                @if($messenger->is_visible)
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
                                                {{ $messenger->created_at->format('j, M Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ $messenger->url }}" target="_blank"
                                                    class="btn btn-primary waves-effect"
                                                    title="View User">
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

@endsection