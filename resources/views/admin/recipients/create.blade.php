@extends('layouts.app')

@section('email')
    {{ __('Create recipient') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('recipient.create') !!}
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
                <div class="card-header">{{ trans('sentence.recipients-create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('recipients.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="mailinglist_id">{{ trans('sentence.mailinglist-list') }}</label>
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
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-rounded btn-primary">
                                    {{ trans('sentence.btn-create') }}
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