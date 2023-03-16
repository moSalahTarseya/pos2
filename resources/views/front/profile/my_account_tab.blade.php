
    <div class="">
        <div class="card-body p-4">
            <form class="form" method="post"
                action="{{route('front.profile-update', auth()->user()->id)}}"
                enctype="multipart/form-data">
                @csrf
                {!! Form::hidden('id', auth()->user()->id, []) !!}
                <div class="row">
                    <div class="col-12 col-xs-12 col-md-12  pt-3">
                        <img src="{{ asset(auth()->user()->image) }}" class="img-50 rounded-circle image-preview"
                            alt="">
                        <br>
                        <label>{{ __('dashboard.image') }} :*</label><br>
                        <label for="fileId" class="btn w3-blue"><i data-feather="upload-cloud"></i></label>
                        <input id="fileId" style="display:none" {{ !auth()->user()->id ? 'required' : '' }} type="file"
                            name="image" class="form-control image" accept="image/jpeg,png,jpg">
                    </div>

                    <div class="row">
                        <div class="col-12 col-xs-12 col-md-6  pt-3">
                            <label>{{ __('dashboard.name') }} :*</label>
                            {!! Form::text('name', auth()->user()->id ? auth()->user()->name : old('name'), [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('dashboard.name'),
                                'maxlength' => '150',
                            ]) !!}
                        </div>
                        <div class="col-12 col-xs-12 col-md-6  pt-3">
                            <label>{{ __('dashboard.email') }} :*</label>
                            {!! Form::email('email', auth()->user()->id ? auth()->user()->email : old('email'), [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('dashboard.email'),
                                'maxlength' => '150',
                            ]) !!}
                        </div>
                        <div class="col-12 col-xs-12 col-md-6  pt-3 form-group">
                            <label>{{ __('dashboard.password') }} :*</label>
                            <input type="password" name="password"
                                value="" class="form-control"
                                placeholder="{{ __('dashboard.password') }}">
                        </div>
                        <div class="col-12 col-xs-12 col-md-6  pt-3">
                            <label>{{ __('dashboard.phone') }} </label>
                            {!! Form::text('phone', auth()->user()->id ? auth()->user()->phone : old('phone'), [
                                'class' => 'form-control',
                                'placeholder' => __('dashboard.phone'),
                                'maxlength' => '150',
                            ]) !!}
                        </div>
                    </div>


                </div>

                <br>
                <div class="row">
                    <div class="col-12 col-xs-12">
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
