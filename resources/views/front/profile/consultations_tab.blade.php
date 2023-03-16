
    <ul class="nav nav-pills" id="consultTab" style="border-bottom: 1px solid #eee;margin-bottom: 15px;">
        <li class="nav-item second-nav">
            <a class="nav-link second-nav active" id="newConsultations-tab" data-toggle="tab" data-target="#newConsultations" type="button" role="tab" aria-controls="newConsultations" aria-selected="true" style="text-decoration: none">
                {{ __('lang.new_consultations') }}
            </a>
        </li>
        <li class="nav-item second-nav">
            <a class="nav-link second-nav" id="oldConsultations-tab" data-toggle="tab" data-target="#oldConsultations" type="button" role="tab" aria-controls="oldConsultations" aria-selected="true" style="text-decoration: none">
                {{ __('lang.old_consultations') }}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="consultTabContent">
        <div class="tab-pane fade show active" id="newConsultations" role="tabpanel" aria-labelledby="newConsultations-tab">
            @foreach ($newConsultations as $newConsultation)
            <div class="row" style="width: 100%;background: #f9fafb;border-radius: 13px;padding: 10px;">
                <div class="col-6 col-lg-4 col-md-4">
                    <h4>
                        <b>
                            {{ App\Models\Setting::keyLang('cv_name') }}
                        </b>
                    </h4>

                    <p class="w3-text-gray">{{ App\Models\Setting::keyLang('cv_job') }}</p>
                </div>
                <div class="col-6 col-lg-4 col-md-4" style="border-right: 1px solid #eee;border-left: 1px solid #eee;">
                    <p>
                        <span data-feather="user"></span>
                        <span><small>{{ auth()->user()->name }}</small></span>
                    </p>
                    <p>
                        <span data-feather="phone"></span>
                        <span class="w3-text-gray"><small>{{ auth()->user()->phone }}</small></span>
                    </p>
                    <p>
                        <span><img style="width: 20px;" src="{{ asset('front/images/icons/zoom.svg') }}" alt=""></span>
                        <span><a target="_blank" href="{{ optional(json_decode($newConsultation->zoom_settings))->join_url }}" style="color: #3984fd;text-decoration: #3984fd;border-bottom: 1.5px solid #3984fd;padding: 6px;">{{ __('lang.consultation_link')}}</a></span>
                    </p>
                </div>
                <div class="col-6 col-lg-4 col-md-4">
                    <p>
                        <span data-feather="calendar"></span>
                        <span><small>{{ optional($newConsultation->appointment)->date }}</small></span>
                    </p>
                    <p>
                        <span data-feather="clock"></span>
                        <span class="w3-text-gray"><small>{{ optional($newConsultation->appointment)->time_from . ' ' . optional($newConsultation->appointment)->time_to }}</small></span>
                    </p>
                    <p>
                        <span data-feather="dollar-sign"></span>
                        <span class="w3-text-gray"><small>{{ optional($newConsultation->appointment)->cost }}</small></span>
                    </p>

                </div>
            </div>
            <br>
            @endforeach

        </div>

        <div class="tab-pane fade" id="oldConsultations" role="tabpanel" aria-labelledby="oldConsultations-tab">
            @foreach ($oldConsultations as $oldConsultation)
            <div class="row" style="width: 100%;background: #f9fafb;border-radius: 13px;padding: 10px;">
                <div class="col-6 col-lg-4 col-md-4">
                    <h4>
                        <b>
                            {{ App\Models\Setting::keyLang('cv_name') }}
                        </b>
                    </h4>

                    <p class="w3-text-gray">{{ App\Models\Setting::keyLang('cv_job') }}</p>
                </div>
                <div class="col-6 col-lg-4 col-md-4" style="border-right: 1px solid #eee;border-left: 1px solid #eee;">
                    <p>
                        <span data-feather="user"></span>
                        <span><small>{{ auth()->user()->name }}</small></span>
                    </p>
                    <p>
                        <span data-feather="phone"></span>
                        <span class="w3-text-gray"><small>{{ auth()->user()->phone }}</small></span>
                    </p>
                    <p>
                        <span><img style="width: 20px;" src="{{ asset('front/images/icons/zoom.svg') }}" alt=""></span>
                        <span><a target="_blank" href="{{ optional(json_decode($oldConsultation->zoom_settings))->join_url }}" style="color: #3984fd;text-decoration: #3984fd;border-bottom: 1.5px solid #3984fd;padding: 6px;">{{ __('lang.consultation_link')}}</a></span>
                    </p>
                </div>
                <div class="col-6 col-lg-4 col-md-4">
                    <p>
                        <span data-feather="calendar"></span>
                        <span><small>{{ optional($oldConsultation->appointment)->date }}</small></span>
                    </p>
                    <p>
                        <span data-feather="clock"></span>
                        <span class="w3-text-gray"><small>{{ optional($oldConsultation->appointment)->time_from . ' ' . optional($oldConsultation->appointment)->time_to }}</small></span>
                    </p>
                    <p>
                        <span data-feather="dollar-sign"></span>
                        <span class="w3-text-gray"><small>{{ optional($oldConsultation->appointment)->cost }}</small></span>
                    </p>

                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
