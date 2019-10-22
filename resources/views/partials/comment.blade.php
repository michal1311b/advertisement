<div class="card">
    <div class="card-header">{{ __('Comment form') }}</div>
    <div class="col-md-12">
        @include('partials.validation-errors')
    </div>
    <div class="col-md-12">
        @include('partials.message')
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('comment-post') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="content">{{ __('Message') }}</label>
                    <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
        </form>
    </div>
</div>