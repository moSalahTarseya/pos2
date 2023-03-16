@extends('dashboard.layouts.master')
@section('title')
    @if ($resource->id)
        {{ __('dashboard.edit_admin') }}
    @else
        {{ __('dashboard.add_admin') }}
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
                            <a href="{{ route('dashboard.admins.index') }}"
                                class="text-muted">{{ __('dashboard.admins') }}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">
                                @if ($resource->id)
                                    {{ __('dashboard.edit_admin') }}
                                @else
                                    {{ __('dashboard.add_admin') }}
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
                    <h4><b> {{ __('dashboard.edit_admin') }}</b></h4>
                @else
                    <h4><b>{{ __('dashboard.add_admin') }}</b></h4>
                @endif
            </div>
            <div class="card-body p-4">
                <form class="form" method="post"
                    action="{{ $resource->id ? route('dashboard.admins.update', $resource->id) : route('dashboard.admins.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', $resource->id, []) !!}
                    <div class="row">


                        <div class="row">
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name') }} :*</label>
                                {!! Form::text('name', $resource->id ? $resource->name : old('name'), [
                                    'class' => 'form-control',
                                    'required',
                                    'placeholder' => __('dashboard.name'),
                                    'maxlength' => '150',
                                ]) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.email') }} :*</label>
                                {!! Form::email('email', $resource->id ? $resource->email : old('email'), [
                                    'class' => 'form-control',
                                    'required',
                                    'placeholder' => __('dashboard.email'),
                                    'maxlength' => '150',
                                ]) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3 form-group">
                                <label>{{ __('dashboard.password') }} :*</label>
                                <input type="password" name="password"
                                    value="" class="form-control"
                                    placeholder="{{ __('dashboard.password') }}">
                            </div>
                            <div class="col-12 col-xs-12 col-md-4 pt-3">
                                <label>{{ __('dashboard.language') }}</label>
                                <select class="form-control" name="language_id" id="language">
                                    <option value="">{{ __('dashboard.select_language') }}</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            {{ $resource->id && $resource->language_id == $language->id ? 'selected' : '' }}>
                                            {{ $language->title }}</option>
                                    @endforeach
                                </select>
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
        var languages = <?php echo json_encode($languages->pluck('img_url', 'id')->toArray()); ?>;

        $(document).ready(function() {
            select2("#language", {
                enable_image: true,
                row:function(resource) {
                    var span = resource.id ?
                        '<span><img src="'+languages[resource.id]+'" class="w3-round" >' +
                            resource.text + '</span>' :
                        '<span>' + resource.text + '</span>';
                    return $(span);
                }
            });
        });
    </script>

@stop
