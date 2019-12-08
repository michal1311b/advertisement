@extends('layouts.app')

@section('title')
    {{ trans('sentence.register-company') }}
@endsection

@section('description')
    {{ trans('sentence.register-company') }}
@endsection

@section('tinymce')
<script src="{{ asset('js/tinymce2.js') }}"></script>
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
                <div class="card-header">{{ trans('sentence.register') }}</div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link step1 active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">{{ trans('sentence.step1') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step2" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">{{ trans('sentence.step2') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step3" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">{{ trans('sentence.step3') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step4" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">{{ trans('sentence.step4') }}</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('register.company.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="step1" role="tabpanel" aria-labelledby="step1">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.username') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.password') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.confirm_password') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_name') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name" autofocus>
                                        @error('company_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_street" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_street') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street" value="{{ old('company_street') }}" autocomplete="company_street" autofocus>
                                        @error('company_street')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_post_code" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="company_post_code" type="text" class="form-control @error('company_post_code') is-invalid @enderror" name="company_post_code" value="{{ old('company_post_code') }}" autocomplete="company_post_code" autofocus>
                                        @error('company_post_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_city" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_city') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ old('company_city') }}" autocomplete="company_city" autofocus>
                                        @error('company_city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_nip" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_nip') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-md-6">
                                        <input id="company_nip" type="number" class="form-control @error('company_nip') is-invalid @enderror" name="company_nip" value="{{ old('company_nip') }}" autocomplete="company_nip" autofocus>
                                        @error('company_nip')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <a class="btn btn-primary go-step2 text-white">
                                            {{ trans('sentence.step2') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>
        
                                    <div class="col-12 col-md-9">
                                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.description') }} <span class="text-danger font-weight-bolder">*</span></label>
        
                                    <div class="col-12 col-md-9">
                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus rows="3">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profits" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.profits') }}</label>
        
                                    <div class="col-12 col-md-9">
                                        <textarea id="profits" class="form-control @error('profits') is-invalid @enderror" name="profits" value="{{ old('profits') }}" autocomplete="profits" autofocus rows="3">
                                            {{ old('profits') }}
                                        </textarea>
                                        @error('profits')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.requirements') }}</label>
        
                                    <div class="col-12 col-md-9">
                                        <textarea id="requirements" class="form-control @error('requirements') is-invalid @enderror" name="requirements" value="{{ old('requirements') }}" autocomplete="requirements" autofocus rows="3">
                                            {{ old('requirements') }}
                                        </textarea>
                                        @error('requirements')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <a class="btn btn-primary go-step3 text-white">
                                            {{ trans('sentence.step3') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ trans('sentence.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($works as $work)
                                                <option {{ old('work_id') == $work->id ? 'selected' : '' }} value="{{ $work->id }}">{{ $work->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('work_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ trans('sentence.location') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($locations as $location)
                                                <option {{ old('location_id') == $location->id ? 'selected' : '' }} value="{{ $location->id }}">
                                                    {{ $location->city }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">{{ trans('sentence.state') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($states as $state)
                                                <option {{ old('state_id') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.post_code') }} <span class="text-danger font-weight-bolder">*</span></label>
        
                                    <div class="col-12 col-md-9">
                                        <input id="post_code" type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ old('postCode') }}" autocomplete="postCode" autofocus>
                                        @error('postCode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.street') }} <span class="text-danger font-weight-bolder">*</span></label>
        
                                    <div class="col-12 col-md-9">
                                        <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street" autofocus>
                                        @error('street')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.phone') }} <span class="text-danger font-weight-bolder">*</span></label>
        
                                    <div class="col-12 col-md-9">
                                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <a class="btn btn-primary go-step4 text-white">
                                            {{ trans('sentence.step4') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id">{{ trans('sentence.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($specializations as $specialization)
                                                <option {{ old('specialization_id') == $specialization->id ? 'selected' : '' }} value="{{ $specialization->id }}">
                                                    {{ $specialization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('specialization_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries">{{ trans('sentence.upload-image') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <input type="file" class="form-control @error('galleries') is-invalid @enderror" name="galleries[]" multiple required/>
                                        @error('galleries')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tags" class="col-12 col-md-3 col-form-label text-md-right warning">
                                        {{ trans('sentence.tags') }} <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.tags-info') }}">!</span>
                                    </label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{ old('tags[]') }}" name="tags[]" id="tags" data-role="tagsinput" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-12 col-md-9">
                                        <input min="0"
                                        id="min_salary" type="number" 
                                        class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ old('min_salary') }}" autocomplete="min_salary" autofocus>
                                        @error('min_salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                                    <div class="col-12 col-md-9">
                                        <input min="0"
                                        id="max_salary" type="number" 
                                        class="form-control @error('max_salary') is-invalid @enderror" name="max_salary" value="{{ old('max_salary') }}" autocomplete="max_salary" autofocus>
                                        @error('max_salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ trans('sentence.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($currencies as $currency)
                                                <option {{ old('currency_id') == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">
                                                    {{ $currency->symbol }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('currency_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ trans('sentence.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('settlement_id') is-invalid @enderror" name="settlement_id" id="settlement_id">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            @foreach($settlements as $settlement)
                                                <option {{ old('settlement_id') == $settlement->id ? 'selected' : '' }} value="{{ $settlement->id }}">
                                                    {{ $settlement->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('settlement_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="negotiable" type="hidden" value="0">
                                            <input class="form-check-input" 
                                                type="checkbox" name="negotiable" id="negotiable" value="1"
                                                {{ old('negotiable', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="negotiable">
                                                {{ trans('sentence.salary_negotiable') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="term1" type="hidden" value="0">
                                            <input class="form-check-input" 
                                                type="checkbox" name="term1" id="term1" value="1"
                                                {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term1">
                                                {{ trans('sentence.accept') }} <a href="{{ route('regulation.show') }}" class="text-lowercase">{{ trans('sentence.regulation') }}</a> {{ __('EmployMed.eu') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="term2" type="hidden" value="0">
                                            <input class="form-check-input" 
                                                type="checkbox" name="term2" id="term2" value="1"
                                                {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term2">
                                                {{ trans('sentence.accept') }} <a href="{{ route('cookies.show') }}" class="text-lowercase">{{ trans('sentence.cookies-policy') }}</a> {{ __('EmployMed.eu') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input name="term3" type="hidden" value="0">
                                            <input class="form-check-input" 
                                                type="checkbox" name="term3" id="term3" value="1"
                                                {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term3">
                                                {{ trans('sentence.data-conversion') }} {{ __('EmployMed.eu') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('sentence.register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection