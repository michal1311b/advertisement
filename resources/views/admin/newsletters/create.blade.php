@extends('layouts.app')

@section('title')
    {{ __('Create newsletter') }}
@endsection

@section('tinymce')
<script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('js/tinymce2.js') }}"></script>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('newsletter.create') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('email.newsletters-create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('newsletters.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="mailinglist_id">{{ trans('email.mailinglist-list') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('mailinglist_id') is-invalid @enderror" name="mailinglist_id" id="mailinglist_id">
                                    <option selected value="">{{ trans('sentence.choose') }}</option>
                                    @foreach($mailinglists as $mailinglist)
                                        <option value="{{ $mailinglist->id }}">{{ $mailinglist->title }}</option>
                                    @endforeach
                                </select>
                                @error('mailinglist_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('profile.name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('email.subject') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" autocomplete="subject" autofocus>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('email.message') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus rows="3">
                                    {{ old('message') }}
                                </textarea>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sending_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('email.sending_date') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="sending_date" type="text" class="form-control @error('sending_date') is-invalid @enderror" name="sending_date" value="{{ old('sending_date') }}" autocomplete="sending_date" autofocus>
                                @error('sending_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('email.time') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="time" type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" autocomplete="time" autofocus>
                                @error('time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-rounded btn-primary">
                                    {{ trans('buttons.btn-create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection