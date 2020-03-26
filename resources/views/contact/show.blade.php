@extends('layouts.site')

@section('title')
    {{ trans('sentence.contact-form') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('contact-form') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.contact-form') }}</div>
                <div class="col-md-12">
                    @include('partials.validation-errors')
                </div>
                <div class="col-md-12">
                    @include('partials.message')
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @honeypot
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required value="{{ auth()->user()->email ?? old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name">{{ trans('sentence.first_name')}}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required value="{{ auth()->user()->name ?? old('first_name') }}">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">{{ trans('sentence.city-not-require')}}</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->profile->city ?? old('city') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">{{ trans('sentence.phone-not-require')}}</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? old('phone') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="message">{{ trans('sentence.message')}}</label>
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" autocomplete="message" autofocus rows="3">
                                    {{ old('message') }}
                                </textarea>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group">
                            <div class="form-check">
                                <input name="term1" type="hidden" value="0">
                                <input class="form-check-input" value="1" required
                                type="checkbox" name="term1" {{ old('term1', 0) == 1 ? 'checked' : '' }}
                                id="term1">
            
                                <label class="form-check-label" for="term1">
                                    {{ trans('sentence.rodo-term') }}
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-primary">{{ trans('sentence.send')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection