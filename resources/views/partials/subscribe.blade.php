<form method="POST" action="{{ route('subscribe') }}">
    @csrf
    <div class="col-md-12">
        @include('partials.message')
    </div>
    <div class="form-group col-md-12">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="specializations" class="col-form-label">{{__('Specializations')}}</label>
        <select multiple="multiple"
                class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                id="specializations" name="specializations[]">
            @foreach ($specializations as $key => $specialization)
                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('specializations'))
            <span class="invalid-feedback" role="alert">
                {{  $errors->first('specializations') }}
            </span>
        @endif

        <div class="pt-3">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif
        
        <div class="form-check pt-3">
            <input name="term1" type="hidden" value="0">
            <input class="form-check-input" 
            type="checkbox" name="term1" id="term1" value="1"
            {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="term1">
                {{ __('term1') }}
            </label>
        </div>
    </div>

    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary mt-3">{{ __('Subscribe') }}</button>
    </div>
</form>