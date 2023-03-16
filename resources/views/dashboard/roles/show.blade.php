@extends('dashboard.layouts.master')
@section('title')
    {{ __('dashboard.show') . ' ' . __('dashboard.role') }}
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
                    <a href="{{ route('dashboard.roles.index') }}" class="text-muted">{{__('dashboard.roles')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted">
                        {{ __('dashboard.show') . ' ' . __('dashboard.role')  }}

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
   <div class="w3-white p-4">
       <legend>
           <h5 class="modal-title">
                   <h4><b> {{ __('dashboard.show') }}</b></h4>

            </h5>
        </legend>
       <div class="row pt-4">
        <div class="form-group">
                {!! Form::hidden('id', $resource->id, []) !!}
                <div class="row">
                    <div class="row">
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name') }} :*</label>
                                    {!! Form::text('name',$resource->id? $resource->name: old('name'), ["class"=>"form-control","disabled","placeholder"=>__('dashboard.name'), 'maxlength'=>'150']) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name_ar') }} :*</label>
                                    {!! Form::text('description',$resource->id? $resource->description: old('description'), ["class"=>"form-control","disabled","placeholder"=>__('dashboard.name_ar'), 'maxlength'=>'150']) !!}
                            </div>
                            <div class="col-12 col-xs-12 col-md-4  pt-3">
                                <label>{{ __('dashboard.name_en') }} :*</label>
                                    {!! Form::text('display_name',$resource->id? $resource->display_name: old('display_name'), ["class"=>"form-control","disabled","placeholder"=>__('dashboard.name_en'), 'maxlength'=>'150']) !!}
                            </div>
                    </div>

                    <div class="row">
                        <div class="card" style="margin-top: 20px!important">
                            <div class="card-header" style="padding: 15px!important">
                                <h3>{{ __('dashboard.permissions') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    @foreach ($permissions as $category => $listPermissions)
                                    <ul class="w3-ul">
                                        <li>
                                            <b class="w3-large" >
                                                {{ __('dashboard.' . $category) }}
                                            </b>
                                            <br>
                                            <ul class="w3-ul sub-list">
                                                @foreach($listPermissions as $permission)
                                                <li style="border-bottom: 0px" >
                                                    <label class=""></label>
                                                        @php $old = old('permissions') @endphp
                                                        <input disabled type="checkbox" class="w3-check selectedBoxPerm checkbox" name="permissions[]" value="{{ $permission->id }}" {{ isset($old) ? (in_array($permission->id , old('permissions')) ? 'checked' : '') : '' }} {{ isset($rolePermissions) ? (in_array($permission->id , $rolePermissions) ? 'checked' : '') : '' }}>
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
        </div>
    </div>
   </div>
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


</script>

@stop
