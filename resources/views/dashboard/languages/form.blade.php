@extends('dashboard.layouts.master')
@section('title')
    @if ($resource->id)
        {{ __('dashboard.edit_language') }}
    @else
        {{ __('dashboard.add_language') }}
    @endif
@stop
@section('content')
    @include('dashboard.layouts.includes.flash_msg')
    <div class="row">
        <!-- Start Top Bar -->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard') }}" class="text-muted">{{ __('dashboard.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard.languages.index') }}"
                                class="text-muted">{{ __('dashboard.languages') }}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">
                                @if ($resource->id)
                                    {{ __('dashboard.edit_language') }}
                                @else
                                    {{ __('dashboard.add_language') }}
                                @endif
                            </span>
                        </li>
                        @if (request()->filled('type'))
                            <li class="breadcrumb-item text-muted">
                                <span class="text-muted">{{ __('dashboard.recycle_bin') }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!-- End Top bar -->
    </div>
    {{-- section content --}}
    <section class="form-body">
        <div class="card">
            <div class="card-header">
                @if ($resource->id)
                    <h4><b> {{ __('dashboard.edit_language') }}</b></h4>
                @else
                    <h4><b>{{ __('dashboard.add_language') }}</b></h4>
                @endif
            </div>
            <div class="card-body p-4">
                <form class="form" method="post"
                    action="{{ $resource->id ? route('dashboard.languages.update', $resource->id) : route('dashboard.languages.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', $resource->id, []) !!}
                    <div class="row">

                        <div class="col-12 col-xs-12 col-md-12  pt-3">
                            <img src="{{ asset($resource->img) }}" class="img-100 rounded-circle image-preview"
                                alt="">
                            <br>
                            <label>{{ __('dashboard.image') }} :*</label><br>
                            <label for="fileId" class="btn w3-blue"><i data-feather="upload-cloud"></i></label>
                            <input id="fileId" style="display:none" {{ !$resource->id ? 'required' : '' }} type="file"
                                name="img" class="form-control image" >
                        </div>

                        <div class="row">
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.title') }} :*</label>
                                {!! Form::text('title', $resource->id ? $resource->title : old('title'), [
                                    'class' => 'form-control',
                                    'required',
                                    'placeholder' => __('dashboard.title'),
                                    'maxlength' => '150',
                                ]) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.slogan') }} :*</label>
                                {!! Form::text('slogan', $resource->id ? $resource->slogan : old('slogan'), [
                                    'class' => 'form-control',
                                    'required',
                                    'placeholder' => __('dashboard.slogan'). ' ' .__('dashboard.like'). ' en, ar',
                                    'maxlength' => '150',
                                ]) !!}
                            </div>
                        </div>


                    </div>

                    <br>
                    <div class="row">
                        <div class="col-12 col-xs-12">
                            <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

@section('css')
    <style>
        select {
            height: 45px;
        }
    </style>
@stop

@section('js')

    <script>
        $('#role').select2();


        $(document).ready(function() {

        });
    </script>

@stop
