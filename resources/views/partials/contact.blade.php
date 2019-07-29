<div class="card">
    <div class="card-header">Contact form</div>

    <div class="card-body">
        <form method="POST" action="{{ route('send-message') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $advertisement->user_id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="city">City (not required)</label>
                <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone (not required)</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus rows="3"></textarea>
                </div>
                </div>
            <div class="form-group">
                <div class="form-check">
                    <input name="term1" type="hidden" value="0">
                    <input class="form-check-input" value="1"
                    type="checkbox" name="term1" {{ old('term1', 0) == 1 ? 'checked' : '' }}
                    id="term1">

                    <label class="form-check-label" for="term1">
                        {{ __('term1') }}
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>