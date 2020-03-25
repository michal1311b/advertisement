<div class="card">
    <div class="card-header">{{ trans('sentence.contact-form') }}</div>
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('send-message', $advertisement->id) }}" enctype="multipart/form-data">
                @csrf
                @if($offerType === 'offer')
                    <input type="hidden" name="emailType" value="offer">
                @elseif($offerType === 'foreign')
                    <input type="hidden" name="emailType" value="foreign">
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required value="{{ auth()->user()->email ?? null }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name">{{ trans('sentence.first_name')}}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required value="{{ auth()->user()->name ?? null }}">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">{{ trans('sentence.city-not-require')}}</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->profile->city ?? null }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">{{ trans('sentence.phone-not-require')}}</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? null }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="message">{{ trans('sentence.message')}}</label>
                    <textarea class="form-control text-left @error('message') is-invalid @enderror" name="message" autocomplete="message" autofocus rows="5">{!! trans('sentence.dear') !!} {!! trans('sentence.send-cv-message') !!} {!! trans('sentence.send-cv-greatings') !!} {{ auth()->user()->name ?? null }} {{ auth()->user()->profile->last_name ?? null }}, {{ auth()->user()->profile->company_phone1 ?? null }}</textarea>
                    @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="cv">{{ trans('sentence.upload-cv')}}</label>
                    
                    @if(isset(auth()->user()->doctor) && auth()->user()->doctor->cv)
                        <a href="{{ auth()->user()->doctor->cv }}" class="btn btn-primary" target="_blank">{{ trans('sentence.show-cv') }}</a>
                    @elseif(isset(auth()->user()->nurse) && auth()->user()->nurse->cv)
                        <a href="{{ auth()->user()->nurse->cv }}" class="btn btn-primary" target="_blank">{{ trans('sentence.show-cv') }}</a>
                    @else
                        <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" required/>
                        @error('cv')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input name="term1" type="hidden" value="0">
                    <input class="form-check-input" value="1" required
                    type="checkbox" name="term1" {{ old('term1', 0) == 1 ? 'checked' : '' }}
                    id="term1">

                    <label class="form-check-label" for="term1">
                        {{ trans('sentence.rodo-term') }}
                    </label>
                 </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('sentence.send')}}</button>
        </form>
    </div>
</div>