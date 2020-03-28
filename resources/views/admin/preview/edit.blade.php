@extends('layouts.app')

@section('title')
    {{ __('Edit jooble ') }}{{ $jooble->name }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('preview.edit', $jooble) !!}
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
                <div class="card-header">{{ trans('buttons.btn-edit') }}: {{ $jooble->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-preview', $jooble) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $jooble->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.description')}}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus rows="3">
                                    {!! $jooble->description !!}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.location') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $jooble->location }}" autocomplete="location" autofocus>
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.min_salary') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $jooble->salary }}" autocomplete="salary" autofocus>
                                @error('salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.work-category') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $jooble->type }}" autocomplete="type" autofocus>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ $jooble->company }}" autocomplete="company" autofocus>
                                @error('company')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $jooble->email }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-rounded btn-primary">
                                    {{ trans('buttons.btn-update') }}
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