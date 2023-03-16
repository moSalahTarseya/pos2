@extends('dashboard.layouts.master')
@section('title')
    {{ __('dashboard.roles') }}
@endsection

@section('css')
    <style>
        .rank-badge {
            top: -19px!important;
            left: 0 !important;
            padding: 2px 4px!important;
            font-size: 11px!important;
            font-weight: 700!important;
            font-family: work-Sans, sans-serif!important;
            position: relative;
            right: 20px !important;
        }
        .quality-badge {
            right: -40px!important;
            top: -17px!important;
            left: -7px !important;
            padding: 2px 4px!important;
            font-size: 11px!important;
            font-weight: 700!important;
            font-family: work-Sans, sans-serif!important;
            position: relative;
        }
        .card{
            height: 90%;
        }

        .card-body {
            padding: 20px!important;
        }

        .rank-title {
            height: 55px;
            text-overflow: ellipsis;
            overflow: hidden;
        }


        .taskadd table tr td:first-child {
            padding-left: 10px !important;
        }
    </style>
@endsection

@section('content')
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
                        <span class="text-muted">{{ __('dashboard.roles') }}</span>
                    </li>
                    @if (request()->filled('type'))
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">{{ __('dashboard.recycle_bin') }}</span>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard.roles.create') }}" style="border: 0;"
                    class="btn btn-primary font-weight-bolder btn-sm"><i class="fa fa-plus"></i>
                    {{ __('dashboard.add_role') }} </a>
            </div>

            <!--end::Info-->

        </div>
    </div>
    <!-- End Top bar -->
    <div class="row">
        @include('dashboard.layouts.includes.flash_msg')
        <div class="container-fluid">
            <div class="row project-cards">
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">
                            <form action="{{route('dashboard.roles.index')}}" class="form-inline col-md-12" method="get">
                                <div class="media col-md-12">
                                    <div class="form-group mb-0 col-md-4">
                                        <input type="text" value="{{app('request')->input('search')? app('request')->input('search') : ''}}" name="search" placeholder="{{__('dashboard.search')}}..." id="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-success">{{__('dashboard.search')}} <i class="fa fa-search" style="display: inline-block;margin:auto"></i></button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($data) > 0)
        <div class="container-fluid">
            <div class="content d-flex flex-column flex-column-fluid">

                <div class="container">
                        <div class="card email-body radius-left">
                        <form action="{{ route('dashboard.roles.destroy_multi') }}" method="POST">
                            @csrf
                            <div class="card-header mb-5" style="padding: 20px !important">
                                <h5 class="mb-0">{{__('dashboard.roles')}}</h5>
                            </div>
                            <span id="btn-delete-all">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="btn btn-danger" type="submit">{{ __('dashboard.delete_all') }}</button>
                                    </div>
                                </div>
                            </span>
                            <div class="card-body p-0">
                                <div class="taskadd">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <thead class="flip-content">
                                                <tr>
                                                    <th><input type="checkbox" class="w3-check" style="color: #e1e1e1!important" id="CheckAll"></th>
                                                    <th>{{ __('dashboard.name') }}</th>
                                                    <th>{{ __('dashboard.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" style="color: #e1e1e1!important" class="selectedBox w3-check" name="resource[{{ $item->id }}][itemId]" value="{{ $item->id }}">
                                                    </td>
                                                    <td>
                                                        <div class="media" style="text-align: {{ app()->getLocale() == 'ar'? 'right' : 'left'}} ">
                                                            <div class="media-body" style="margin: auto;padding-{{ app()->getLocale() == 'ar'? 'right' : 'left'}}: 10px;">
                                                                <b class="w3-large">
                                                                    {{ app()->getLocale() == 'ar' ? $item->description : $item->display_name }}
                                                                </b>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('dashboard.roles.show',$item->id) }}"
                                                            class="button btn btnstyle w3-text-white" style="background: #2bc620">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('dashboard.roles.edit',$item->id) }}"
                                                            class="button btn btnstyle w3-text-white" style="background: #26529b">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" data-id="{{ $item->id }}" id="deleteRow" class="button btn btnstyle w3-text-white deleteRow" style="background: #d90000" title="{{ __('dashboard.delete') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{$data->render()}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>

        @else
        <div class="col-xl-12">
            <div class="card bg-img alert-sec">
                <div class="card-header">
                    <div class="header-top">
                        <div class="w3-block m-0 w3-center text-center w3-xlarge">
                            <span data-feather="database" ></span>
                                {{ __('dashboard.there_is_no_data') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection

@section('js')
<script>
    @if (request()->role_id > 0)
        $('.show-modal').modal('show');
    @endif
</script>
<script>
    $('.deleteRow').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "{{ __('dashboard.are_you_sure_to_delete') }}",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{ __('dashboard.yes') }}",
            cancelButtonText: "{{ __('dashboard.no') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data("id");
                console.log(id);
                var url = "{{ route('dashboard.roles.destroy', ":id") }}";
                url = url.replace(':id', id);
                $.ajax({
                    type:'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    enctype: 'multipart/form-data',
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    contentType: false,
                    processData: false,
                    success : function(data){
                        location.reload();
                    },
                    error: function(data){
                    }
                });
                Swal.fire(
                    "{{ __('dashboard.this_item_has_been_deleted') }}",
                    '',
                    'success'
                )
            } else {
                window.location.reload();
            }
        })
    });
</script>
@endsection
