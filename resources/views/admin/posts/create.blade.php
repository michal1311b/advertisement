@extends('layouts.app')

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('posts.create') !!}
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
                <div class="card-header">{{ __('Create post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-12 col-md-3 col-form-label text-md-right">{{ __('body') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="body" type="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" autocomplete="title" autofocus rows="3"></textarea>
                                @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="is_published" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="is_published" id="is_published" value="1"
                                    {{ old('is_published', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                     {{ __('publish now?') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="category_id">{{ __('Category') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                    <option selected>Choose...</option>
                                    @foreach($categories as $category)
                                        @if($category->is_active === 1)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}" disabled>{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="cover">{{ __('Upload cover image') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" />
                                @error('cover')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pins" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Tags') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="text" value="" name="pins[]" id="pins" data-role="tagsinput" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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