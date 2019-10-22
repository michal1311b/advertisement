<div class="card">
    <div class="card-header">{{ __('Reply form') }}</div>
    <div class="col-md-12">
        @include('partials.validation-errors')
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('send-reply') }}">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
            <input type="hidden" name="email" value="{{ $contact->email }}">
            <input type="hidden" name="emailType" value="AnswerMail">
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="message">{{ __('Message') }}</label>
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
        </form>
    </div>
</div>