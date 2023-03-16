@extends('dashboard.layouts.master')
@section('title')
    @if ($resource->id)
        {{ __('dashboard.edit_user') }}
    @else
        {{ __('dashboard.add_user') }}
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
                            <a href="{{ route('dashboard.users.index') }}"
                                class="text-muted">{{ __('dashboard.users') }}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">
                                @if ($resource->id)
                                    {{ __('dashboard.edit_user') }}
                                @else
                                    {{ __('dashboard.add_user') }}
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
                    <h4><b> {{ __('dashboard.edit_user') }}</b></h4>
                @else
                    <h4><b>{{ __('dashboard.add_user') }}</b></h4>
                @endif
            </div>
            <div class="card-body p-4">
                <form class="form" method="post"
                    action="{{route('dashboard.users.update', $resource->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', $resource->id, []) !!}
                    <div class="row">
                        <div class="col-12 col-xs-12 col-md-12  pt-3">
                            <img src="{{ asset($resource->image) }}" class="img-100 rounded-circle image-preview"
                                alt="">
                            <br>
                            <label>{{ __('dashboard.image') }} :*</label><br>
                            <label for="fileId" class="btn w3-blue"><i data-feather="upload-cloud"></i></label>
                            <input id="fileId" style="display:none" {{ !$resource->id ? 'required' : '' }} type="file"
                                name="image" class="form-control image" accept="image/jpeg,png,jpg">
                        </div>

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
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.phone') }} </label>
                                {!! Form::text('phone', $resource->id ? $resource->phone : old('phone'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('dashboard.phone'),
                                    'maxlength' => '150',
                                ]) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4 pt-3">
                                <label>{{ __('dashboard.country_code') }}</label>
                                <select class="form-control" name="country_code" id="countryCode">
                                    <option value="">{{ __('dashboard.select_country') }}</option>
                                    @foreach ($countryCodes as $countryCode)
                                        <option value="{{ $countryCode->id }}"
                                            {{ $resource->id && $resource->country_code == $countryCode->id ? 'selected' : '' }}>
                                            {{ $countryCode->country_name }}</option>
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
        $('#role').select2();

        var countryCodes = <?php echo json_encode($countryCodes->pluck('image', 'id')->toArray()); ?>;

        $(document).ready(function() {
            select2("#countryCode", {
                enable_image: true,
                row: function(resource) {
                    var span = resource.id ?
                        '<span><img src="' + countryCodes[resource.id] + '" class="w3-round" >' + resource
                        .text + '</span>' :
                        '<span>' + resource.text + '</span>';
                    return $(span);
                }
            });
        });
    </script>

@stop
