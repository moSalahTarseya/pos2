@extends('dashboard.layouts.master')
@section('title')
    @if ($resource->id)
    {{ __('dashboard.edit_role') }}
    @else
    {{ __('dashboard.add_role') }}
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
                    <a href="{{ route('dashboard.settings.index') }}" class="text-muted">{{ __('dashboard.settings') }}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard.roles.index') }}" class="text-muted">{{__('dashboard.roles')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted">
                        @if ($resource->id)
                        {{ __('dashboard.edit_role') }}
                        @else
                        {{ __('dashboard.add_role') }}
                        @endif
                    </span>
                </li>
                @if(request()->filled('type'))
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted">{{__('dashboard.recycle_bin')}}</span>
                    </li>
                @endif
            </ul>
        </div>
        <!--end::Info-->
    </div>
</div>
<!-- End Top bar -->
</div>
{{-- section content  --}}
<section class="form-body">
    <div class="card">
        <div class="card-header">
            @if ($resource->id)
            <h4><b> {{ __('dashboard.edit_role') }}</b></h4>
            @else
            <h4><b>{{ __('dashboard.add_role') }}</b></h4>
            @endif
        </div>
        <div class="card-body p-4">
            <form  class="form" method="post" action="{{$resource->id? route('dashboard.roles.update',$resource->id): route('dashboard.roles.store')}}" enctype="multipart/form-data">
            @csrf
                {!! Form::hidden('id', $resource->id, []) !!}
                <div class="row">
                    <div class="row">
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name') }} :*</label>
                                    {!! Form::text('name',$resource->id? $resource->name: old('name'), ["class"=>"form-control","required","placeholder"=>__('dashboard.name'), 'maxlength'=>'150']) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name_ar') }} :*</label>
                                    {!! Form::text('description',$resource->id? $resource->description: old('description'), ["class"=>"form-control","required","placeholder"=>__('dashboard.name_ar'), 'maxlength'=>'150']) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name_en') }} :*</label>
                                    {!! Form::text('display_name',$resource->id? $resource->display_name: old('display_name'), ["class"=>"form-control","required","placeholder"=>__('dashboard.name_en'), 'maxlength'=>'150']) !!}
                            </div>
                    </div>

                    <div class="row">
                        <div class="card" style="margin-top: 20px!important">
                            <div class="card-header" style="padding: 15px!important">
                                <h3>{{ __('dashboard.permissions') }}</h3>
                                <span>
                                    <input type="checkbox" class="w3-check" id="CheckAllPerm">
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    @foreach ($permissions as $category => $listPermissions)
                                    <ul class="w3-ul">
                                        <li>
                                            <b class="w3-large" >
                                                <input type="checkbox"
                                                onclick="$(this).parent().parent().find('.sub-list .checkbox').click()"
                                                class="w3-check selectedBoxPerm checkCategory" id="CheckAll">
                                                {{ __('dashboard.' . $category) }}
                                            </b>
                                            <br>
                                            <ul class="w3-ul sub-list">
                                                @foreach($listPermissions as $permission)
                                                <li style="border-bottom: 0px" >
                                                    <label class=""></label>
                                                        @php $old = old('permissions') @endphp
                                                        <input type="checkbox" class="w3-check selectedBoxPerm checkbox" name="permissions[]" value="{{ $permission->id }}" {{ isset($old) ? (in_array($permission->id , old('permissions')) ? 'checked' : '') : '' }} {{ isset($rolePermissions) ? (in_array($permission->id , $rolePermissions) ? 'checked' : '') : '' }}>
                                                        <span></span>
                                                        {{ app()->getLocale() == 'ar' ? $permission->description : $permission->display_name }}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <br>
                                    </ul>
                                    @endforeach
                                </div>

                            </div>
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
    select{
        height: 45px;
    }
</style>
@stop

@section('js')
<script type="text/javascript">

</script>
<script>

$('#CheckAllPerm').on('click', function() {
        if($(this).prop('checked') === true) {
            $('.selectedBoxPerm').prop('checked', true);

        }else {
            $('.selectedBoxPerm').prop('checked', false);
        }
    });

</script>

@stop
