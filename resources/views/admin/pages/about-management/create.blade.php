@extends('admin.layouts.app')
@section('header-links')

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
                            <h1 class="m-0 p-0 custom-heading">About Us</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{ route($url_group.'.about-us.index') }}">
                                <i class="fas fa-plus"></i></i> Reload
                            </a>
                        </div>
                    </div>

                    <div class="mt-5 from-wrapper">
                        <form action="{{ route($url_group.'.about-us.store') }}" method="post" enctype="multipart/form-data"
                            class="submit-form-form">
                            @csrf
                            <div class="row mt-4 justify-content-center">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <img id="chapter-icon" src="{{ empty($data) ? asset('no-image.png') : asset('storage/'.$data->image) }}" alt="" srcset="" class="input-group-text m-0 p-0 w-100" 
                                        id="basic-addon5" height="300px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="image"
                                                onchange="document.getElementById('chapter-icon').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend w-100">
                                                <span class="input-group-text w-100" id="basic-addon5">Details</span>
                                            </div>
                                            <textarea class="form-control {{($errors->first('details') ? "border border-danger" : "")}}" 
                                                name="details"
                                                placeholder="Enter details"
                                                id="editor" contenteditable="true">{!! empty($data) ? old('details') : $data->details !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary submit-btn submit-btn-form" data-name="form">
                                            <i class="fas fa-check"></i> Save
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection

@section('footer-links')
{{-- <script src="{{ asset('all/admin/ckeditor5/build/ckeditor.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );

    $(document).ready(function () {
        $('.ck-rounded-corners').addClass('w-100');

        $('.submit-btn').click(function() {
            var name = $(this).attr('data-name');
            $(".submit-btn-"+name).attr("disabled", true);
            $('.submit-btn-'+name).html('Processing...');
            $('.submit-form-'+name).submit();
            return true;
        });
    })
</script>

@endsection