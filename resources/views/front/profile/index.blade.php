@extends('front.layouts.master')
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp
@section('title')
    {{ __('lang.profile') }}
@endsection

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <style>
        .back_ground{
            background: #F9FAFB;
        }
        .review-color {
            color: #FFC107
        }

        .activeClass{
        background: rgb(194, 192, 192);
        }
        .datepicker-inline {
            width: 100%;
        }
        .datepicker table{
            width: 100%
        }
        .datepicker table tr td.day:hover,.datepicker table tr td.active.active, .datepicker table tr td.active:hover.active{
            background: #5EDB9D;
            color: #000;
        }
        .datepicker td{
            padding: 20px;
            border-radius: 50%;
        }
        .datepicker table tr td.active.active{
            background: #5EDB9D;
            color: #000;
        }

        .btn-outline-primary:not(:disabled):not(.disabled).active,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .btn-outline-primary:hover{
        color: #0e0c0c;
        font-weight: 600;
        background-color: #5EDB9D;
        border-color: #5EDB9D;
        }
        .btn-outline-primary,.btn-outline-primary:focus{
            border-color: gray;
            color: gray
        }
        #time-work{
            display: flex;
            flex-direction: column;
        }
        .hide{
            display: none
        }
        .btn-success:disabled {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
        cursor: no-drop;
        }

        /* section.footer{
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        } */
        ul.nav-pills li{
            display: block !important;
            width: 100%;
        }
        ul.nav-pills li.second-nav{
            display: inline !important;
            width: auto !important;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
            background-color: #fff !important;
            color:#3c5cc7 !important;
            font-weight: bold;
        }
        .nav-pills .nav-link.second-nav.active, .nav-pills .show>.nav-link{
            background-color: #fff !important;
            color:#000 !important;
            font-weight: bold;

            border-bottom: 2px solid #000;
        }
        .nav-pills .nav-link.second-nav{
            color:gray !important;
        }
        .nav {
            padding: 0 !important
        }
        .notifications-card .list-group-item{
            border: none !important;
            border-bottom: 1px solid rgba(0,0,0,.125) !important;
        }
        .chat-box-tab{
            border: 1px solid #eee;
            overflow: auto;
            padding: 7px;
            border-radius: 7px;
            min-height: 355px;
            position: relative;
        }
        .chat-input{
            position: absolute;
            bottom: 7px;
            left: 2px;
            right: 8px;
        }

        .chat {
	margin-top: auto;
	margin-bottom: auto;
}

.chat-card {
	height: 500px;
	border-radius: 15px !important;
	/* background-color: rgba(0, 0, 0, 0.4) !important; */
}

.contacts_body {
	padding: 0.75rem 0 !important;
	overflow-y: auto;
	white-space: nowrap;
}

.msg_card_body {
	overflow-y: auto;
}

.chat-card-header {
	border-radius: 15px 15px 0 0 !important;
	border-bottom: 0 !important;
}


.container {
	align-content: center;
}

.search {
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
}

.search:focus {
	box-shadow: none !important;
	outline: 0px !important;
}

.type_msg {
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	height: 60px !important;
	overflow-y: auto;
}

.type_msg:focus {
	box-shadow: none !important;
	outline: 0px !important;
}

.attach_btn {
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
}

.send_btn {
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
}

.search_btn {
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0, 0, 0, 0.3) !important;
	border: 0 !important;
	color: white !important;
	cursor: pointer;
}

.contacts {
	list-style: none;
	padding: 0;
}

.contacts li {
	width: 100% !important;
	padding: 5px 10px;
	margin-bottom: 15px !important;
}



.user_img {
	height: 60px;
	width: 60px;
	border: 1.5px solid #f5f6fa;
}

.user_img_msg {
	height: 40px;
	width: 40px;
	border: 1.5px solid #f5f6fa;
}

.img_cont {
	position: relative;
	height: 70px;
	width: 70px;
}

.img_cont_msg {
	height: 40px;
	width: 40px;
}

.online_icon {
	position: absolute;
	height: 15px;
	width: 15px;
	background-color: #4cd137;
	border-radius: 50%;
	bottom: 13px;
	right: 13px;
	border: 1.5px solid white;
}

.offline {
	background-color: #c23616 !important;
}

.user_info {
	margin-top: auto;
	margin-bottom: auto;
	margin-left: 15px;
}

.user_info span {
	font-size: 20px;
	color: white;
}

.user_info p {
	font-size: 10px;
	color: rgba(255, 255, 255, 0.6);
}

.video_cam {
	margin-left: 50px;
	margin-top: 5px;
}

.video_cam span {
	color: white;
	font-size: 20px;
	cursor: pointer;
	margin-right: 20px;
}

.msg_cotainer {
	margin-top: auto;
	margin-bottom: auto;
	margin-left: 10px;
	border-radius: 25px;
	background-color: #94a8ff54;
	padding: 10px;
	position: relative;
}

.msg_cotainer_send {
	margin-top: auto;
	margin-bottom: auto;
	margin-right: 10px;
	border-radius: 25px;
	background-color: #c5d3ff30;
	padding: 10px;
	position: relative;
}

.msg_time {
	position: absolute;
	left: 0;
	bottom: -15px;
	color: #000;
    background: #f9fafb;
	font-size: 10px;
}

.msg_time_send {
	position: absolute;
	right: 0;
	bottom: -15px;
	color: #000;
    background: #f9fafb;
	font-size: 10px;
}

.msg_head {
	position: relative;
}

#action_menu_btn {
	position: absolute;
	right: 10px;
	top: 10px;
	color: white;
	cursor: pointer;
	font-size: 20px;
}

.action_menu {
	z-index: 1;
	position: absolute;
	padding: 15px 0;
	background-color: rgba(0, 0, 0, 0.5);
	color: white;
	border-radius: 15px;
	top: 30px;
	right: 15px;
	display: none;
}

.action_menu ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

.action_menu ul li {
	width: 100%;
	padding: 10px 15px;
	margin-bottom: 5px;
}

.action_menu ul li i {
	padding-right: 10px;
}

.action_menu ul li:hover {
	cursor: pointer;
	background-color: rgba(0, 0, 0, 0.2);
}
    </style>
@endsection

@section('content')
@include('partials._session')
<section class="back_ground pt-5 pb-5">
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-12">
            <div class="person-info">
                <div class="card mb-3 border-0 w3-round-xxlarge">
                    <div class="row no-gutters {{ $dir=='rtl' ?'text-right' :'text-left' }}">
                        <div class="col-md-12 pt-2 ">
                            <div class="card-body ">
                                <ul class="nav nav-pills" id="sidTab">

                                    <li class="nav-item ">
                                        <a class="nav-link active" id="my_account-tab" data-toggle="tab" data-target="#my_account" type="button" role="tab" aria-controls="my_account" aria-selected="true" style="text-decoration: none">
                                            <div class="customer-review ">
                                                <div class="stare ">
                                                   <div class="person-info">
                                                        <span  data-feather="user" style="display: inline-block"></span>
                                                        <span class="mr-2 ml-2">{{ __('lang.my_account') }}</span>
                                                   </div>
                                               </div>
                                               <hr>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link" class="customer-review ">
                                            <div class="stare ">
                                                <div class="person-info">
                                                <span for="log-out" data-feather="log-out" class="w3-text-red" style="color: red;display: inline-block;rotate:{{ isRtl()?'180deg':'0deg' }};"></span>
                                                <span style="display: inline-block">
                                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="log-out" style="text-decoration: none" class="mr-2 ml-2" href="{{ route('logout') }}">{{ __('lang.log_out') }} </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </span>

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="card border-0 w3-round-xxlarge p-lg-4 p-sm-2  {{ $dir=='rtl' ?'text-right' :'text-left' }}" style="min-height: 97%;">
                <div class="tab-content" id="sidTabContent">

                    <div class="tab-pane active" id="my_account" role="tabpanel" aria-labelledby="my_account-tab">
                        @include('front.profile.my_account_tab')
                    </div>
                </div>
            </div>


        </div>
    </div>
   </div>
</section>
@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

</script>


@endsection
