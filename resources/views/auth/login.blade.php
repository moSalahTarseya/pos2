
<section >
        <div class="row ">
            <div class="col-md-12">
                <div class="card w3-round-xlarge border-0">

                    <div class="card-body" id="form-login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">

                                    <div class="col-md-12">
                                        {{-- <label for="email" class="col-form-label "><b>{{ __('lang.email') }}:</b></label> --}}
                                        <input id="email" type="email" class=" form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('lang.email') }}"  autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-12">
                                        {{-- <label for="password" class=" col-form-label "><b>{{ __('lang.password') }} :</b></label> --}}
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('lang.password') }}"  autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary w3-block">{{ __('lang.login') }}</button>

                                    <br>
                                    <div class="w3-block pt-2">
                                       <div class="row">
                                            <div class="col-5 border-top mt-3"></div>
                                            <div class="col-2 text-center">{{ __('lang.or') }}</div>
                                            <div class="col-5 mt-3 border-top"></div>
                                       </div>
                                    </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body hide" id="form-register">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('lang.name') }}" autofocus required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('lang.email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('lang.password') }} " required>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('lang.confirm_password') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary w3-block">
                                            {{ __('lang.register') }}
                                        </button>

                                        <br>
                                    <div class="w3-block pt-2">
                                       <div class="row">
                                            <div class="col-5 border-top mt-3"></div>
                                            <div class="col-2 text-center">{{ __('lang.or') }}</div>
                                            <div class="col-5 mt-3 border-top"></div>
                                       </div>
                                    </div>
                              </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
