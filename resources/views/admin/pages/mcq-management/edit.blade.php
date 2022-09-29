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
                            <h1 class="m-0 p-0 custom-heading">Edit Lecture</h1>
                            <div class="under-line-wrapper d-flex justify-content-around align-items-center">
                                <span class="left-line w-100"></span>
                                <span class="diamond"></span>
                                <span class="right-line w-100"></span>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{ route($url_group.'.mcq.edit', $data->id) }}">
                                <i class="fas fa-plus"></i></i> Reload
                            </a>
                        </div>
                    </div>

                    <div class="mt-5 from-wrapper">
                        <form action="{{ route($url_group.'.mcq.update', $data->id) }}" method="post" enctype="multipart/form-data"
                            class="submit-form-form">
                            @csrf
                            @method('PUT')
                            <div class="row mt-4">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon5">Select Lecture<span class="text-danger">*</span> </span>
                                            </div>
                                            <select class="form-control {{($errors->first('lecture') ? "border border-danger" : "")}}" 
                                                name="lecture" id="">
                                                <option value="" {{ $data->lecture_id == '' ? 'selected' : '' }}>Select Option</option>
                                                @foreach ($lectures as $lecture)
                                                    <option value="{{ $lecture->id }}" {{ $data->lecture_id == $lecture->id ? 'selected' : '' }}>{{ $lecture->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon5">Question<span class="text-danger">*</span></span>
                                            </div>
                                            <textarea name="question"
                                                class="form-control {{($errors->first('question') ? "border border-danger" : "")}}"
                                                placeholder="Enter question">{{ $data->question }}</textarea>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group w-100">
                                        <div class="input-group w-100">
                                            <div class="input-group-prepend w-100">
                                              <span class="input-group-text w-100" id="basic-addon5">Give Options and Check the Answer</span>
                                              <button type="button" class="btn btn-dark add-more-otp" title="Add More Option">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="row options">
                                        @php
                                            $options = explode(', ', $data->options);
                                        @endphp
                                        @foreach ($options as $option)
                                            @php
                                                $ind = ++$loop->index;
                                            @endphp
                                            <div class="col-sm-12 col-md-6 col-lg-6 opt-{{ $ind }}">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon5"><input type="radio" name="answer" value="{{ $ind }}" {{ $ind == $data->answer ? 'checked' : '' }}></span>
                                                        </div>
                                                        <input 
                                                            type="text" 
                                                            class="form-control {{($errors->first('options') ? "border border-danger" : "")}}" 
                                                            name="options[]" value="{{ $option }}" placeholder="Enter Option">
                                                            
                                                            @if ($ind >2)
                                                                <i class="fas fa-trash-alt remove-option mt-2 text-danger btn m-0 p-0" data-inc="{{ $ind }}"></i>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
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
<script>


    $(document).ready(function () {

        $('.submit-btn').click(function() {
            var name = $(this).attr('data-name');
            $(".submit-btn-"+name).attr("disabled", true);
            $('.submit-btn-'+name).html('Processing...');
            $('.submit-form-'+name).submit();
            return true;
        });

        let opt_count = parseInt("{{ $ind }}")+1;

        $('.add-more-otp').click(function() {
            let opt = '<div class="col-sm-12 col-md-6 col-lg-6 opt-'+opt_count+'">'+
                        '<div class="form-group">'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="basic-addon5">'+
                                        '<input type="radio" name="answer" value="'+opt_count+'">'+
                                    '</span>'+
                                '</div>'+
                                '<input class="form-control" type="text" name="options[]" value="" placeholder="Enter Option">'+
                                '<i class="fas fa-trash-alt remove-option mt-2 text-danger btn m-0 p-0" data-inc="'+opt_count+'"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
            ++opt_count;
            $('.options').append(opt);
        });

        $(document.body).on("click",".remove-option",function(){
            var dataInc = $(this).attr('data-inc');
            $(".opt-"+dataInc).remove();
            opt_count--;
        });
    })
</script>
@endsection