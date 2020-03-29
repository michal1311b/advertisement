@extends('layouts.app')

@section('title')
    {{ trans('sentence.category-edit') }}{{ $category->name }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('categories.edit', $category) !!}
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
                <div class="card-header">{{ trans('sentence.category-edit') }} {{ $category->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('profile.name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" autocomplete="name" autofocus>
                                @error('name')
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
                                    {{ ($category->is_active  == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                     {{ trans('sentence.active') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
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