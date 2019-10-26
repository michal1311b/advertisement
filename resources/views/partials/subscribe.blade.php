<form method="POST" action="{{ route('subscribe') }}">
    @csrf
    <div class="form-group col-md-12">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">{{ __('Subscribe') }}</button>
    </div>
</form>