
    <div class="notifications-card" style="max-height: 435px;overflow: auto;">
            <div class="list-group">
                @if ($notifications->count() > 0)
                @foreach ($notifications as $notification)
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $notification->title }}</h5>
                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ $notification->description }}</p>
                    </a>
                @endforeach
                @else
                <a href="#" class="list-group-item list-group-item-action w3-center">
                    <div class="d-flex w-100 justify-content-between text-center">
                      <h5 class="mb-1">{{ __('lang.there_is_no_data') }}</h5>
                    </div>
                  </a>
                @endif

            </div>

    </div>
