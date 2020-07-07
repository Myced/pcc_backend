@extends('layouts.main')

@section('title')
    {{ "Manage Users" }}
@endsection

@section('styles')
    <!-- JQuery DataTable Css -->
    <link href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Users
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th rowspan="1" colspan="1">S/N</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Telephone </th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Reg. Date</th>
                                <th rowspan="1" colspan="1">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">S/N</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Telephone </th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Reg. Date</th>
                                <th rowspan="1" colspan="1">Actions</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @php
                                $count = 1;
                            @endphp

                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $count++ }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->tel }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->created_at->format('j, M Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.show', ['id' => $user->id]) }}" 
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
</div>
@endsection

@section('scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="/assets/js/pages/tables/jquery-datatable.js"></script>
@endsection