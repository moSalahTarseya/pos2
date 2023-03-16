
    <ul class="nav nav-pills" id="my_follow" style="border-bottom: 1px solid #eee;margin-bottom: 15px;">
        <li class="nav-item second-nav">
            <a class="nav-link second-nav active" id="chat-tab" data-toggle="tab" data-target="#chat" type="button" role="tab" aria-controls="chat" aria-selected="true" style="text-decoration: none">
                {{ __('lang.chat') }}
            </a>
        </li>
        <li class="nav-item second-nav">
            <a class="nav-link second-nav" id="file_image-tab" data-toggle="tab" data-target="#file_image" type="button" role="tab" aria-controls="file_image" aria-selected="true" style="text-decoration: none">
                {{ __('lang.images') }}
            </a>
        </li>
        <li class="nav-item second-nav">
            <a class="nav-link second-nav" id="file_video-tab" data-toggle="tab" data-target="#file_video" type="button" role="tab" aria-controls="file_video" aria-selected="true" style="text-decoration: none">
                {{ __('lang.videos') }}
            </a>
        </li>
        <li class="nav-item second-nav">
            <a class="nav-link second-nav" id="file_file-tab" data-toggle="tab" data-target="#file_file" type="button" role="tab" aria-controls="file_file" aria-selected="true" style="text-decoration: none">
                {{ __('lang.files') }}
            </a>
        </li>
        <li class="nav-item second-nav">
            <a class="nav-link second-nav" id="links-tab" data-toggle="tab" data-target="#links" type="button" role="tab" aria-controls="links" aria-selected="true" style="text-decoration: none">
                {{ __('lang.links') }}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="my_followContent">
        <iframe src="{{ url('/chatify') }}" class="chatbox" style="position: absolute;left: 0px;top: 0px;border: none;width: 100%;height: 100%;" frameborder="0"></iframe>
    </div>
