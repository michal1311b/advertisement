<div class="card">
    <div class="card-header">Reply form</div>
    <div class="col-md-12">
        @include('partials.validation-errors')
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('send-message') }}">
            @csrf
           
            <input type="hidden" name="emailType" value="AnswerMail">
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>