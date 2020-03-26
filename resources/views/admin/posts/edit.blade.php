@extends('layouts.app')

@section('title')
    {{ __('Edit post ') }}{{ $post->title }}
@endsection

@section('tinymce')
<script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('js/tinymce2.js') }}"></script>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('posts.edit', $post) !!}
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
                <div class="card-header">{{ __('Edit post: ') }} {{ $post->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.body') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="body" type="body" class="form-control @error('body') is-invalid @enderror" name="body" autocomplete="body" autofocus rows="3">
                                    {!! $post->body !!}
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
                                    <input name="is_published" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="is_published" id="is_published" value="1"
                                    {{ $post->is_published  == 1 ? 'checked' : '' }}>
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
                                            <option value="{{ $category->id }}" 
                                                @if($category->id === $post->category_id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @else
                                            <option value="{{ $category->id }}" disabled 
                                                @if($category->id === $post->category_id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-md-9 offset-md-3">
                                <img src="{{ $post->cover }}" class="w-100"/>
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
                            <label for="pins" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.tags') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="text" value="{{$pins}}" name="pins[]" id="pins" data-role="tagsinput" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-rounded btn-primary">
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