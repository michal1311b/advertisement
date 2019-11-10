@extends('layouts.app')

@section('content')

<div class="col-md-8">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body p-5">
            <p class="text-muted">Add language</p>

            <form method="POST" action="{{ route('language.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ trans('sentence.name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input id="local_name" type="local_name" class="form-control{{ $errors->has('local_name') ? ' is-invalid' : '' }}" name="local_name" value="{{ old('local_name') }}" placeholder="{{ __('Local name') }}" required autofocus>

                    @if ($errors->has('local_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('local_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input id="lang_key" type="lang_key" class="form-control{{ $errors->has('lang_key') ? ' is-invalid' : '' }}" name="lang_key" value="{{ old('lang_key') }}" placeholder="{{ __('Lang key') }}" required autofocus>

                    @if ($errors->has('lang_key'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lang_key') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary px4">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
