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
                    <div class="col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center mb-3">
                        <img src="{{ $data->avatar ? asset('storage/'.$data->avatar) : asset('no-image.png') }}" width="80px" height="80px" alt="">
                        <h4 class="m-0 p-0">{{ $data->name }}</h4>
                        <p class="m-0 p-0"><b>Email: </b>{{ $data->email }}</p>
                        <p class="m-0 p-0"><b>Phone: </b>{{ $data->phone }}</p>
                        <p class="m-0 p-0"><b>Address: </b>{{ $data->address }}</p>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="right-section">
                            <div class="card-deck text-center">
                                <div class="card bg-success text-light">
                                    <div class="card-body text-light">
                                        <h5 class="card-title text-light">Chapter Completed</h5>
                                        <p class="card-text num_of_chapter text-light"></p>
                                    </div>
                                </div>
                                <div class="card bg-primary text-light">
                                    <div class="card-body text-light">
                                        <h5 class="card-title text-light">lecture Completed</h5>
                                        <p class="card-text num_of_lecture text-light"></p>
                                    </div>
                                </div>
                                <div class="card bg-info text-light">
                                    <div class="card-body text-light">
                                        <h5 class="card-title text-light">Obtained Marks</h5>
                                        <p class="card-text num_of_obtain text-light">0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive my-4">
                        <table id="style-3" class="table style-3  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Chapter</th>
                                    <th scope="col">Lecture</th>
                                    <th scope="col">Quiz</th>
                                    <th scope="col">Point</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            @php
                                $chapter_array = array();
                                $lecture_array = array();
                            @endphp
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        @if (!in_array($result->lecture->chapter->id, $chapter_array))
                                            @php
                                                array_push($chapter_array,$result->lecture->chapter->id);
                                            @endphp
                                        @endif
                                        @if (!in_array($result->lecture->id, $lecture_array))
                                            @php
                                                array_push($lecture_array,$result->lecture->id);
                                            @endphp
                                        @endif
                                        <td scope="row">{{ ++$loop->index }}</td>
                                        <td>{{ $result->lecture->chapter->title }}</td>
                                        <td>{{ $result->lecture->title }}</td>
                                        <td>{{ $result->total_correct }}/{{ $result->total_correct + $result->total_wrong }}</td>
                                        <td></td>
                                        <td></td>
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

        $( document ).ready(function() {
            $('.num_of_chapter').text("{{ count($chapter_array) }}");
            $('.num_of_lecture').text("{{ count($lecture_array) }}");
            $('.num_of_obtain').text("0");
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->  
@endsection