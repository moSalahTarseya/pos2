@extends('dashboard.layouts.master')

@section('css')
<style>
   .news-update{
    padding: 30px 40px;
    border-bottom: 1px solid #ecf3fa;
}
    .photo {
        height: 430px !important;
    }
    .f1 .f1-steps .f1-step {
    position: relative;
    float: left;
    width: 24.333333% !important;
    text-align: center;
}
</style>
@stop

@section('title')
{{ __('dashboard.profile') }}
@stop
@section('content')
<br>
<!-- Start Top Bar -->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size">
                <li class="breadcrumb-item text-muted ">
                    <a href="{{route('dashboard')}}" class="text-muted">{{__('dashboard.dashboard')}}</a>
                </li>
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted">{{__('dashboard.profile')}}</span>
                </li>

            </ul>
        </div>


        <!--end::Info-->

        <!--end::Toolbar-->
    </div>
    @include('dashboard.layouts.includes.flash_msg')

    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                        </div> --}}
                        <div class="card-body">
                            <form action="{{route('dashboard.admins.update' , $resource->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2 m-auto">
                                    <div class="profile-title w3-block">
                                        <div class="media w3-block  w3-center">
                                            <div class="rounded-circle m-auto" style="background-image: url('{{$resource->image ?asset($resource->image) : asset('images/user.png')}}'); height: 150px; width: 150px; background-position: center;background-size: cover"></div>


                                        </div>

                                    </div>
                                </div>
                                <div class=" col-12 mb-3">
                                    <p><strong class="w3-text-indigo"> <span data-feather="user" class="feather-20"> </span> {{ __('dashboard.user_name') }} : </strong> {{$resource->username }}</p>
                                </div>

                                <div class=" col-12 mb-3">
                                    <a href="mailto::{{$resource->email}}"><strong class="w3-text-indigo"> <span data-feather="mail" class="feather-20"> </span> {{ __('dashboard.email') }} : </strong> {{$resource->email}} </a>
                                </div>
                                <div class=" col-12 mb-3">
                                    <a href="tel::{{$resource->phone}}"><strong class="w3-text-indigo"> <span data-feather="phone" class="feather-20"> </span> {{ __('dashboard.phone') }} : </strong> {{$resource->phone}} </a>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-xl-8">
                    <form class="card">
                        <div class="card-header p-4">
                            <h4 class="card-title mb-0">{{__('dashboard.profile')}}</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">



                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('js')





@stop
