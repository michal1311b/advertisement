@extends('layouts.app')

@section('title')
    {{ trans('sentence.pages-create') }}
@endsection

@section('tinymce')
<script src="{{ asset('js/tinymce2.js') }}"></script>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('pages.edit', $page) !!}
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
                <div class="card-header">{{ __('Edit page') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pages.update', $page) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $page->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shot_description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.short_descp') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="shot_description" type="text" class="form-control @error('shot_description') is-invalid @enderror" name="shot_description" value="{{ $page->shot_description }}" autocomplete="shot_description" autofocus>
                                @error('shot_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.body') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" autocomplete="body" autofocus rows="3">
                                    {!! $page->body !!}
                                </textarea>
                                @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="is_active" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="is_active" id="is_active" value="1"
                                    {{ ($page->is_active  == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        {{ trans('sentence.active') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('sentence.btn-update') }}
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