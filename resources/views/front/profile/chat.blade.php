<div class="row justify-content-center h-100" style="width: 100%">

    <div class="col-md-12 col-xl-12 chat">
        <div class="chat-card">
            <div class="chat-card-body msg_chat-card_body">
                @foreach ($messages as $message)
                    @if ($message->model_type_from == 'App\Models\User')
                    {{-- message from user --}}
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            {{-- <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"> --}}
                            <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('images/user.png') }}" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            {{ $message->message }}
                            <span class="msg_time">{{ $message->created_at }}</span>
                        </div>
                    </div>
                    @else
                    {{-- message from admin --}}
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            {{ $message->message }}
                            <span class="msg_time_send">{{ $message->created_at }}</span>
                        </div>
                        <div class="img_cont_msg">
                    <img src="{{ asset( App\Models\Setting::where('key' , 'logo')->first()->value ) }}" class="rounded-circle user_img_msg">
                    {{-- <img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256" class="rounded-circle user_img_msg"> --}}
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
