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

<style>
    #drop-zone {
        max-width: 450px;
        height: 450px;
        border: 2px dotted blue;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #drop-zone img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        display: none;
    }
</style>

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
                        <div class="back-btn-container">
                            
                        </div>
                        <div class="custom-heading-wrapper">
                            <h1 class="m-0 p-0 custom-heading">Slider List</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                        <div>
                            {{-- <a class="btn btn-primary" href="{{ route($url_group.'.slider-list.create') }}">
                                <i class="fas fa-plus"></i></i> Add New Package
                            </a> --}}
                            @if (count($datas)<4)
                                <button type="button" 
                                    class="btn btn-warning mb-2 mr-2" 
                                    data-toggle="modal" data-target="#slideupModal">
                                    <i class="fas fa-plus"></i></i> Add New SLider
                                </button>
                            @endif

                            <div id="slideupModal" class="modal animated slideInUp custo-slideInUp" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New SLider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <form action="{{ route($url_group.'.slider-list.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div id="drop-zone">
                                                    <img src="" id="img" alt="">
                                                    <p id="p">Drop file or click to upload</p>
                                                    <input type="file" id="myfile" name="slider_image" hidden>
                                                </div>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td><img src="{{ asset('storage/'.$item->slider_image) }}" width="100px" height="100px" alt=""></td>
                                    <td>
                                        @if ($item->status == 0 )
                                            Inactive
                                        @else
                                            Active
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <button type="button" 
                                            class="btn m-0 p-0 px-1 btn-warning"
                                            title="Edit"
                                            data-toggle="modal" data-target="#slideupModalEdit-{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <div id="slideupModalEdit-{{ $item->id }}" class="modal animated slideInUp custo-slideInUp" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit SLider</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route($url_group.'.slider-list.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                        
                                                        <div class="modal-body">
                                                            <div class="custom-file mb-4">
                                                                <input type="hidden" value="{{ $item->slider_image }}" name="old_img">
                                                                <input accept="image/*" type='file' 
                                                                    class="custom-file-input slider-update-input" id="imgInp{{ $item->id }}" name="slider_image">
                                                                <label class="custom-file-label" for="imgInp{{ $item->id }}">Update Slider...</label>
                                                                <div class="invalid-feedback">
                                                                    @error('slider_image')
                                                                        <small class="text-danger mb-2" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <img id="preview{{ $item->id }}" src="{{ asset('storage/'.$item->slider_image) }}" width="100%" height="300px" alt="your image" />
                                                        </div>
                                                        <script>
                                                            imgInp{{ $item->id }}.onchange = evt => {
                                                                const [file] = imgInp{{ $item->id }}.files
                                                                if (file) {
                                                                    preview{{ $item->id }}.src = URL.createObjectURL(file)
                                                                }
                                                            }
                                                        </script>
                                                        <div class="modal-footer md-button">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <a href="{{ route($url_group.'.slider-list.edit', $item->id) }}" 
                                            class="btn m-0 p-0 px-1 btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
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

<script>
    const dropZone = document.querySelector('#drop-zone');
    const inputElement = document.querySelector('#myfile');
    const img = document.querySelector('#img');
    let p = document.querySelector('#p')

    inputElement.addEventListener('change', function (e) {
        const clickFile = this.files[0];
        if (clickFile) {
            img.style = "display:block;";
            p.style = 'display: none';
            const reader = new FileReader();
            reader.readAsDataURL(clickFile);
            reader.onloadend = function () {
                const result = reader.result;
                let src = this.result;
                img.src = src;
                img.alt = clickFile.name
            }
        }
    })
    dropZone.addEventListener('click', () => inputElement.click());
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        img.style = "display:block;";
        let file = e.dataTransfer.files[0];

        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            e.preventDefault()
            p.style = 'display: none';
            let src = this.result;
            img.src = src;
            img.alt = file.name
        }
    });
</script>


@endsection