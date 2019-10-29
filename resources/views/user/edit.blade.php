@extends('layouts.app')

@section('title')
    {{ __('User profile') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('edit-user', $editUser) !!}
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
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-header">{{ __('Edit your profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-user', $editUser->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                            <div class="col-12 col-md-9">
                                @if($editUser->avatar)
                                    <img src="{{ $editUser->avatar }}" class="user-avatar">
                                @else
                                    <img src="{{ asset('images/chicken-at-facebook.jpg') }}" class="user-avatar">
                                @endif
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $editUser->name }}" autocomplete="name" autofocus>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            @if($editUser->provider_name)
                                <label for="password" class="col-12 col-md-3 col-form-label text-md-right"></label>

                                <div class="col-12 col-md-9">
                                <input id="password" type="hidden" value="null" name="password">
                            @else
                            <label for="password" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-12 col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $editUser->profile->last_name }}" autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Street') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $editUser->profile->street }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_code" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Post code') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ $editUser->profile->post_code }}" autocomplete="post_code" autofocus>
                                @error('post_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-12 col-md-3 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $editUser->profile->city }}" autocomplete="city" autofocus>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $editUser->profile->company_name }}" autocomplete="company_name" autofocus>
                                @error('company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_street" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company street') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street" value="{{ $editUser->profile->company_street }}" autocomplete="company_street" autofocus>
                                @error('company_street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_post_code" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company post code') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_post_code" type="text" class="form-control @error('company_post_code') is-invalid @enderror" name="company_post_code" value="{{ $editUser->profile->company_post_code }}" autocomplete="company_post_code" autofocus>
                                @error('company_post_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_city" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company city') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ $editUser->profile->company_city }}" autocomplete="company_city" autofocus>
                                @error('company_city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_nip" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company NIP') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_nip" type="number" class="form-control @error('company_nip') is-invalid @enderror" name="company_nip" value="{{ $editUser->profile->company_nip }}" autocomplete="company_nip" autofocus>
                                @error('company_nip')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_phone1" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company phone') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_phone1" type="number" class="form-control @error('company_phone1') is-invalid @enderror" name="company_phone1" value="{{ $editUser->profile->company_phone1 }}" autocomplete="company_phone1" autofocus>
                                @error('company_phone1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_phone2" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company additional phone') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="company_phone2" type="number" class="form-control @error('company_phone2') is-invalid @enderror" name="company_phone2" value="{{ $editUser->profile->company_phone2 }}" autocomplete="company_phone2" autofocus>
                                @error('company_phone2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if($editUser->specializations && $editUser->doctor !== null)
                            <div class="form-group row">
                                <label for="specializations" class="col-12 col-md-3 col-form-label text-md-right">{{__('Specializations')}}</label>
                                <div class="col-12 col-md-9">
                                    <select multiple="multiple"
                                            class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                            id="specializations" name="specializations[]">
                                        @foreach ($specializations as $key => $specialization)
                                            @if(in_array($specialization->id, $editUser->specializations->pluck('id')->toArray()))
                                                <option value="{{ $specialization->id }}"
                                                selected>{{ $specialization->name }}</option>
                                            @else
                                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('specializations'))
                                        <span class="invalid-feedback" role="alert">
                                            {{  $errors->first('specializations') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-header">{{ __('Edit your experience') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-experience', $editUser) }}">
                        @csrf
                        @if($editUser->doctor !== null)
                            <div class="form-group row">
                                <label for="workplace" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Workplace') }}</label>

                                <div class="col-12 col-md-9">
                                    <input id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ $experience->workplace ?? '' }}" autocomplete="workplace" autofocus>
                                    @error('workplace')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exp_company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Company name') }}</label>

                                <div class="col-12 col-md-9">
                                    <input id="exp_company_name" type="text" class="form-control @error('exp_company_name') is-invalid @enderror" name="exp_company_name" value="{{ $experience->exp_company_name ?? '' }}" autocomplete="exp_company_name" autofocus>
                                    @error('exp_company_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exp_city" class="col-12 col-md-3 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-12 col-md-9">
                                    <input id="exp_city" type="text" class="form-control @error('exp_city') is-invalid @enderror" name="exp_city" value="{{ $experience->exp_city ?? '' }}" autocomplete="exp_city" autofocus>
                                    @error('exp_city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Start date') }}</label>

                                <div class="col-12 col-md-9">
                                    <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $experience->start_date ?? '' }}" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                    @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ __('End date') }}</label>

                                <div class="col-12 col-md-9">
                                    <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $experience->end_date ?? '' }}" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                                    @error('end_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input name="until_now" type="hidden" value="0">
                                        <input class="form-check-input" 
                                        type="checkbox" name="until_now" id="until_now" value="1"
                                        {{ old('until_now', 0)  == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="until_now">
                                        {{ __('until now?') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="responsibility" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Responsibilities') }}</label>

                                <div class="col-12 col-md-9">
                                    <textarea id="responsibility" type="responsibility" class="form-control @error('responsibility') is-invalid @enderror" name="responsibility" value="{{ old('responsibility') }}" autocomplete="responsibility" autofocus rows="3"></textarea>
                                    @error('responsibility')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    </form>

                    @foreach($editUser->experiences as $experience)
                        <div class="row pt-3">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Workplace') }}</div>

                            <div class="col-12 col-md-9">
                                {{ $experience->workplace }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Company name') }}</div>

                            <div class="col-12 col-md-9">
                                {{ $experience->exp_company_name }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('City') }}</div>

                            <div class="col-12 col-md-9">
                                {{ $experience->exp_city }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Start') }}</div>

                            <div class="col-12 col-md-9">
                                {{ $experience->start_date }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('End') }}</div>

                            <div class="col-12 col-md-9">
                                {{ $experience->end_date }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Responsibilities') }}</div>

                            <div class="col-12 col-md-9">
                                {!! $experience->responsibility !!}
                            </div>
                        </div>
                    @endforeach
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