<div class="modal form-modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content  w3-round-xlarge {{ $dir=='rtl'?'text-right' :'text-left' }}">
        <div class="modal-header">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">

            <div class="log">
                <label id="label-login" style="width: 235px" class="btn btn-outline-primary p-2" for="btn-check-login">{{ __('lang.login') }}
                    <input type="radio" style="display: none" class="btn-check"  name="options"  id="btn-check-login" autocomplete="off">
                </label><br>

            </div>
            <div class="log-out">
                <label id="label-register" style="width: 235px" class="btn btn-outline-primary p-2" for="btn-check-logout">{{ __('lang.register') }}
                    <input style="display: none" type="radio"  class="btn-check"   name="options" id="btn-check-logout" autocomplete="off">
                </label><br>

            </div>
            </div>
        </div>
        {{-- <div class="modal-body"> --}}
          @include('auth.login')

      </div>
    </div>
  </div>
