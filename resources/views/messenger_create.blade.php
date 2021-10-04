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

        <div class="block-header">
            <h2>UPLOAD NEW MESSENGER </h2>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Book Information</h2>
                    </div>
                    <div class="body">
                        
                        <form class="form-horizontal" 
                            action="{{ route('messenger.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="NameSurname" class="col-sm-2 control-label">Book Name:</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="name" name="name" 
                                            placeholder=" Name visible to users in the app" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email" class="col-sm-2 control-label">Book Code:</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="Email" 
                                            name="code" placeholder="Code: E.g. ME-02-2020" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Year: </label>

                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <select name="year" class="form-control show-tick" required>
                                            <option value="">-- Please select --</option>
                                            @php
                                                $start = 2019;
                                                $end = (int) date("Y");
                                            @endphp
                                            @for($i = $start; $i <= $end; $i++)
                                                <option value="{{ $i }}">
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telephone" class="col-sm-2 control-label">Is Visible: </label>

                                <div class="col-sm-10">
                                    <div class="">
                                        <div class="switch">
                                            <label>OFF<input type="checkbox" name="is_visible" checked><span class="lever"></span>ON</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="NameSurname" class="col-sm-2 control-label">Upload PDF:</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="pdf" 
                                            placeholder=" Name visible to users in the app" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">
                                        <strong>Upload Book</strong>
                                    </button>
                                </div>
                            </div>
                            
                        </form>

                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            
            <!-- #END# Browser Usage -->
        </div>

    </div>
@endsection