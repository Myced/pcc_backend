@extends('layouts.main')

@section('title')
    {{ "Purchases" }}
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
                    Purchases
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
                                <th rowspan="1" colspan="1">Item</th>
                                <th rowspan="1" colspan="1">Price</th>
                                <th rowspan="1" colspan="1">Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">S/N</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Telephone </th>
                                <th rowspan="1" colspan="1">Item</th>
                                <th rowspan="1" colspan="1">Price</th>
                                <th rowspan="1" colspan="1">Date</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @php
                                $count = 1;
                            @endphp

                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>
                                        {{ $count++ }}
                                    </td>
                                    <td>
                                        {{ $purchase->customer_name }}
                                    </td>
                                    <td>
                                        {{ $purchase->customer_tel }}
                                    </td>
                                    <td>
                                        {{ $purchase->item_name }}
                                    </td>
                                    <td>
                                        {{ $purchase->amount }}
                                    </td>
                                    <td>
                                        {{ $purchase->created_at->format('j, M Y') }}
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