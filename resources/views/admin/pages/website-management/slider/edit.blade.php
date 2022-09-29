@extends('admin.layouts.app')
@section('header-links')

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
                    <div class="d-flex justify-content-center align-items-center">
                        
                        <div class="custom-heading-wrapper">
                            <h1 class="m-0 p-0 custom-heading">Edit List</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center align-items-center">
                        <form action="{{ route($url_group.'.slider-list.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row  mb-4">
                                <label for="headding-one" class="col-sm-2 col-form-label col-form-label-sm">Department Image</label>
                                <div class="col-sm-10 text-left">
                                    <div class="">
                                        <input type="hidden" value="{{ $item->slider_image }}" name="old_img">
                                        <input accept="image/*" type='file' id="imgInp{{ $item->id }}" class="slider-update-input" name="slider_image" />
                                        <br>
                                        @error('slider_image')
                                            <small class="text-danger mb-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                        
                                    </div>
                                    <img id="preview{{ $item->id }}" src="{{ asset('storage/'.$item->slider_image) }}" width="300px" height="300px" alt="your image" />
                                </div>
                            </div>
                            <script>
                                imgInp{{ $item->id }}.onchange = evt => {
                                    const [file] = imgInp{{ $item->id }}.files
                                    if (file) {
                                        preview{{ $item->id }}.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
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