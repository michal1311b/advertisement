@extends('layouts.app')

@section('title')
    {{ __('Register form') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('sentence.register') }}</div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab" aria-controls="doctor" aria-selected="true">{{ trans('sentence.doctor') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dentist-tab" data-toggle="tab" href="#dentist" role="tab" aria-controls="dentist" aria-selected="true">{{ trans('sentence.dentist') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false">{{ trans('sentence.company') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <input id="type" type="hidden" class="form-control" name="type" value="doctor" required autocomplete="type" autofocus>
                                    <label for="pwz" class="col-md-4 col-form-label text-md-right">{{ __('PWZ') }}</label>

                                    <div class="col-md-6">
                                        <input id="pwz" type="number" class="form-control @error('pwz') is-invalid @enderror" name="pwz" value="{{ old('pwz') }}" required autocomplete="pwz" autofocus>

                                        @error('pwz')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.birthday') }}</label>

                                    <div class="col-md-6">
                                        <input id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                        @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.first_name') }}</label>

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
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.password') }}</label>

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
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.confirm_password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }}</label>
                                    <div class="col-md-6">
                                        <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                            <option selected>{{ trans('sentence.choose') }}</option>
                                            <option {{ old('sex') == 'male' ? 'selected' : '' }} value="male">{{ trans('sentence.male') }}</option>
                                            <option {{ old('sex') == 'female' ? 'selected' : '' }} value="female">{{ trans('sentence.female') }}</option>
                                        </select>
                                        @error('sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="specializations" class="col-md-4 col-form-label text-md-right">{{trans('sentence.specializations')}}</label>
                                    <div class="col-md-6">
                                        <select multiple="multiple"
                                                class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                id="specializations" name="specializations[]">
                                            @foreach ($specializations->take(75) as $key => $specialization)
                                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('specializations'))
                                            <span class="invalid-feedback" role="alert">
                                                {{  $errors->first('specializations') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="specializations" class="col-md-4 col-form-label text-md-right">{{trans('sentence.specializations.pending')}}</label>
                                    <div class="col-md-6">
                                        <select multiple="multiple"
                                                class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                id="specializationsp" name="specializationsp[]">
                                            @foreach ($specializations->take(75) as $key => $specialization)
                                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('specializations'))
                                            <span class="invalid-feedback" role="alert">
                                                {{  $errors->first('specializations') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term1" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term1" id="term1" value="1"
                                            {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term1">
                                            {{ __('term1') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term2" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term2" id="term2" value="1"
                                            {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term2">
                                            {{ __('term2') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term3" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term3" id="term3" value="1"
                                            {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term3">
                                            {{ __('term3') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('sentence.register') }}
                                        </button>

                                        <a href="{{ route('login.provider', 'google') }}" 
                                        class="btn btn-secondary">{{ __('Google Sign in') }}</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="dentist" role="tabpanel" aria-labelledby="dentist-tab">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <input id="type" type="hidden" class="form-control" name="type" value="doctor" required autocomplete="type" autofocus>
                                    <label for="pwz" class="col-md-4 col-form-label text-md-right">{{ __('PWZ') }}</label>

                                    <div class="col-md-6">
                                        <input id="pwz" type="number" class="form-control @error('pwz') is-invalid @enderror" name="pwz" value="{{ old('pwz') }}" required autocomplete="pwz" autofocus>

                                        @error('pwz')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.birthday') }}</label>

                                    <div class="col-md-6">
                                        <input id="birthday_d" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                        @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.first_name') }}</label>

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
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.password') }}</label>

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
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.confirm_password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }}</label>
                                    <div class="col-md-6">
                                        <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                            <option>{{ trans('sentence.choose') }}</option>
                                            <option {{ old('sex') == 'male' ? 'selected' : '' }} value="male">{{ trans('sentence.male') }}</option>
                                            <option {{ old('sex') == 'female' ? 'selected' : '' }} value="female">{{ trans('sentence.female') }}</option>
                                        </select>
                                        @error('sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="specializations" class="col-md-4 col-form-label text-md-right">{{trans('sentence.specializations')}}</label>
                                    <div class="col-md-6">
                                        <select multiple="multiple"
                                                class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                id="specializations_d" name="specializations[]">
                                            @foreach ($specializations->reverse()->take(9) as $key => $specialization)
                                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('specializations'))
                                            <span class="invalid-feedback" role="alert">
                                                {{  $errors->first('specializations') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="specializationsp" class="col-md-4 col-form-label text-md-right">{{trans('sentence.specializations.pending')}}</label>
                                    <div class="col-md-6">
                                        <select multiple="multiple"
                                                class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                id="specializations_dp" name="specializationsp[]">
                                            @foreach ($specializations->reverse()->take(9) as $key => $specialization)
                                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('specializations'))
                                            <span class="invalid-feedback" role="alert">
                                                {{  $errors->first('specializations') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term1" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term1" id="term1" value="1"
                                            {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term1">
                                            {{ __('term1') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term2" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term2" id="term2" value="1"
                                            {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term2">
                                            {{ __('term2') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term3" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term3" id="term3" value="1"
                                            {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term3">
                                            {{ __('term3') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('sentence.register') }}
                                        </button>

                                        <a href="{{ route('login.provider', 'google') }}" 
                                        class="btn btn-secondary">{{ __('Google Sign in') }}</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input id="type" type="hidden" class="form-control" name="type" value="company" required autocomplete="type" autofocus>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.name') }}</label>

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
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.password') }}</label>

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
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.confirm_password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="street" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.street') }}</label>

                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street" autofocus>
                                        @error('street')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="post_code" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.post_code') }}</label>

                                    <div class="col-md-6">
                                        <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" autocomplete="post_code" autofocus>
                                        @error('post_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.city') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>
                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_name') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name" autofocus>
                                        @error('company_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_street" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_street') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street" value="{{ old('company_street') }}" autocomplete="company_street" autofocus>
                                        @error('company_street')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_post_code" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_post_code') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_post_code" type="text" class="form-control @error('company_post_code') is-invalid @enderror" name="company_post_code" value="{{ old('company_post_code') }}" autocomplete="company_post_code" autofocus>
                                        @error('company_post_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_city" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_city') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ old('company_city') }}" autocomplete="company_city" autofocus>
                                        @error('company_city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_nip" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.company_nip') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_nip" type="number" class="form-control @error('company_nip') is-invalid @enderror" name="company_nip" value="{{ old('company_nip') }}" autocomplete="company_nip" autofocus>
                                        @error('company_nip')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term1" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term1" id="term1" value="1"
                                            {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term1">
                                            {{ __('term1') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term2" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term2" id="term2" value="1"
                                            {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term2">
                                            {{ __('term2') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input name="term3" type="hidden" value="0">
                                            <input class="form-check-input" 
                                            type="checkbox" name="term3" id="term3" value="1"
                                            {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="term3">
                                            {{ __('term3') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ trans('sentence.register') }}
                                        </button>

                                        <a href="{{ route('login.provider', 'google') }}" 
                                        class="btn btn-secondary">{{ __('Google Sign in') }}</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
