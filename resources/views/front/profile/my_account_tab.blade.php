
    <div class="">
        <div class="card-body p-4">
            <form class="form" method="post"
                action="{{route('front.profile-update', auth()->user()->id)}}"
                enctype="multipart/form-data">
                @csrf
                {!! Form::hidden('id', auth()->user()->id, []) !!}
                <div class="row">
                    
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
