@extends('admin.layouts.app')
@section('header-links')

@endsection
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('all/admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/admin/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/admin/plugins/table/datatable/custom_dt_custom.css') }}">
    
    {{-- Modal Links --}}
    <link href="{{ asset('all/admin/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('all/admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('all/admin/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
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
                        <div class="back-btn-container">
                            
                        </div>
                        <div class="custom-heading-wrapper">
                            <h1 class="m-0 p-0 custom-heading">Chapter List</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{ route($url_group.'.chapter.create') }}">
                                <i class="fas fa-plus"></i></i> Add New
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive my-4">
                        <table id="style-3" class="table style-3  table-hover">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center"> SL </th>
                                    <th class="text-center">Image</th>
                                    <th>Title</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach ($datas as $data)    
                                        <tr>
                                            <td class="checkbox-column text-center"> {{ ++$loop->index }} </td>
                                            <td class="text-center">
                                                <span><img src="{{ $data->icon ? asset('storage/'.$data->icon) : asset('no-image.png') }}" class="profile-img" alt="avatar"></span>
                                            </td>
                                            <td>{{ $data->title }}</td>
                                            <td class="text-center"><span class="shadow-none badge badge-{{ $data->status == 1 ? 'primary' : 'danger' }}">{{ $data->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="{{ route($url_group.'.chapter.edit', $data->id) }}" 
                                                            class="bs-tooltip" 
                                                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="fas fa-edit fa-2x"></i>
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                        <a href="javascript:void(0);" 
                                                            class="bs-tooltip" 
                                                            data-toggle="modal" data-target="#delete-confirm-modal-{{ $data->id }}" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <a href="javascript:void(0);" 
                                                            class="bs-tooltip" 
                                                            data-toggle="modal" data-target="#status-change-modal-{{ $data->id }}" title="Status Change">
                                                                <i class="fas fa-toggle-{{ $data->status == 1 ? 'on text-success' : 'off text-danger' }} fa-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <div id="delete-confirm-modal-{{ $data->id }}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                        <div class="d-flex flex-column justify-content-between align-items-center">
                                                            <i class="far fa-question-circle fa-10x text-warning"></i>
                                                            <h4 class="modal-title">Are you sure?</h4>
                                                        </div>
                                                        <p class="modal-text text-center mt-3">Do you really want to change status?</p>
                                                        <div class="mt-3 d-flex justify-content-center">
                                                            <button class="btn btn-light mr-2" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                                                            <a href="{{ route($url_group.'.chapter.status.change', $data->id ) }}" 
                                                                class="btn btn-danger ml-2"><i class="fas fa-check"></i>Yes
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="status-change-modal-{{ $data->id }}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                        <div class="d-flex flex-column justify-content-between align-items-center">
                                                            <i class="far fa-question-circle fa-10x text-warning"></i>
                                                            <h4 class="modal-title">Are you sure?</h4>
                                                        </div>
                                                        <p class="modal-text text-center mt-3">Do you really want to change status?</p>
                                                        <div class="mt-3 d-flex justify-content-center">
                                                            <button class="btn btn-light mr-2" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                                                            <a href="{{ route($url_group.'.chapter.status.change', $data->id ) }}" 
                                                                class="btn btn-danger ml-2"><i class="fas fa-check"></i>Yes
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- Modal Links --}}
    <script src="{{ asset('all/admin/assets/js/scrollspyNav.js') }}"></script>   

    <script src="{{ asset('all/admin/plugins/table/datatable/datatables.js') }}"></script>
    <script>

        c3 = $('#style-3').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });

        multiCheck(c3);
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->  
@endsection