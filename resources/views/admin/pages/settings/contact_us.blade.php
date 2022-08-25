@extends('admin.layouts.app')
@section('header-links')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">


{{-- Modal Links --}}
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('admin/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

@endsection

@section('contents')

@if(Auth::check() && Auth::user()->role_id == 1)
    <?php $url_group = 'superadmin' ?>
@elseif(Auth::check() && Auth::user()->role_id == 2)
    <?php $url_group = 'admin' ?>
@elseif(Auth::check() && Auth::user()->role_id == 3)
    <?php $url_group = 'staff' ?>
@endif

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            
                        </div>
                        <div class="custom-heading-wrapper">
                            <h1 class="m-0 p-0 custom-heading">Contact Us List</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                        <div>
                            
                        </div>
                    </div>

                    <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>
                                        {{ $item->name }}<br>
                                        <small>Email: {{ $item->email }}</small>
                                    </td>
                                    <td>{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>
                                        @php
                                            $text = substr($item->message,10)
                                        @endphp
                                        {!! $text !!}......
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
    @include('admin.layouts.footer')
</div>
@endsection

@section('footer-links')
<script src="{{ asset('admin/plugins/table/datatable/datatables.js')}}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ asset('admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
<script src="{{ asset('admin/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
<script>
    $('#html5-extension').DataTable( {
        // dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        dom: '<"row"<"col-md-12"<"row"<"col-md-2"l><"col-md-6"B><"col-md-4"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7 
    } );
</script>


{{-- Modal Links --}}
<!--  BEGIN CUSTOM SCRIPT FILE  -->
<script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>   
<!--  END CUSTOM SCRIPT FILE  -->


@endsection