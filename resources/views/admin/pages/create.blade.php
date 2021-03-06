@extends('layouts.app')

@section('title')
    {{ trans('sentence.pages-create') }}
@endsection

@section('tinymce')
<script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('js/tinymce2.js') }}"></script>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('pages.create') !!}
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
                <div class="card-header">{{ trans('sentence.pages-create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pages.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shot_description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.short_descp') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="shot_description" type="text" class="form-control @error('shot_description') is-invalid @enderror" name="shot_description" value="{{ old('shot_description') }}" autocomplete="shot_description" autofocus>
                                @error('shot_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.body') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="body" type="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" autocomplete="body" autofocus rows="3"></textarea>
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
                                    <input class="form-check-input custom-checkbox" 
                                    type="checkbox" name="is_active" id="is_active" value="1"
                                    {{ old('is_active', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        {{ trans('sentence.active') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
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