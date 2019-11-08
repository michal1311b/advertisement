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
                    <form method="POST" action="{{ route('update-user', $editUser) }}" enctype="multipart/form-data">
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

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="sex">{{ __('Sex') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                        <option selected>Choose...</option>
                                        <option 
                                            @if($editUser->doctor->sex === 'male') 
                                            selected
                                            @endif 
                                            value="male">{{ __('Male') }}</option>
                                        <option 
                                            @if($editUser->doctor->sex === 'female') 
                                            selected
                                            @endif 
                                            value="female">{{ __('Female') }}</option>
                                    </select>
                                    @error('sex')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-left">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if($editUser->doctor)
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
                                    <div class="col-md-12 text-left">
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

                                <div class="col-12 col-md-7">
                                    {{ $experience->workplace }}
                                </div>

                                <div class="col-12 col-md-2 btn-group text-right">

                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalremove{{$experience->id}}">Delete</i>
                                    </button>

                                    @include('partials.confirmation', [
                                        'url' => route('delete-experience', $experience->id),
                                        'method' => 'DELETE',
                                        'title' => "Usuń doświadczenie",
                                        "description" => "Czy na pewno chcesz usunąć doświadczenie?",
                                        "description_parameters" => [],
                                        'button' => 'Usuń',
                                        'modalKey' => "remove".$experience->id
                                    ])

                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#modaledit{{$experience->id}}">Edit</i>
                                    </button>

                                    @include('partials.edit', [
                                        'url' => route('update-experience', $experience),
                                        'method' => 'PUT',
                                        'title' => "Edycja",
                                        "description" => "Czy na pewno chcesz zaktualizować doświadczenie?",
                                        "description_parameters" => [],
                                        'button' => 'Update',
                                        'modalKey' => "edit".$experience->id
                                    ])
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Company name') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $experience->exp_company_name }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('City') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $experience->exp_city }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Start') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $experience->start_date }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('End') }}</div>

                                <div class="col-12 col-md-7">
                                    @if($experience->end_date)
                                        {{ $experience->end_date }}
                                    @else
                                        {{ __('Until now') }}
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Responsibilities') }}</div>

                                <div class="col-12 col-md-7">
                                    {!! $experience->responsibility !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-12 py-3">
                <div class="card">
                    <div class="card-header">{{ __('Edit your courses') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store-course', $editUser) }}">
                            @csrf
                            @if($editUser->doctor !== null)
                                <div class="form-group row">
                                    <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" autocomplete="name" autofocus>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="organizer" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Organizer') }}</label>

                                    <div class="col-12 col-md-9">
                                        <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" value="" autocomplete="organizer" autofocus>
                                        @error('organizer')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Start date') }}</label>

                                    <div class="col-12 col-md-9">
                                        <input id="start_course" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                        @error('start_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ __('End date') }}</label>

                                    <div class="col-12 col-md-9">
                                        <input id="end_course" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                                        @error('end_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-left">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>

                        @foreach($editUser->courses as $course)
                            <div class="row pt-3">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Name') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $course->name }}
                                </div>

                                <div class="col-12 col-md-2 btn-group text-right">

                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalremove{{$course->id}}">{{ __('Delete') }}</i>
                                    </button>

                                    @include('partials.confirmation', [
                                        'url' => route('delete-course', $course->id),
                                        'method' => 'DELETE',
                                        'title' => "Usuń kurs",
                                        "description" => "Czy na pewno chcesz usunąć kurs?",
                                        "description_parameters" => [],
                                        'button' => 'Usuń',
                                        'modalKey' => "remove".$course->id
                                    ])

                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#modaleditcourse{{$course->id}}">Edit</i>
                                    </button>

                                    @include('partials.edit-course', [
                                        'url' => route('update-course', $course),
                                        'method' => 'PUT',
                                        'title' => "Edycja",
                                        "description" => "Czy na pewno chcesz zaktualizować kurs?",
                                        "description_parameters" => [],
                                        'button' => 'Update',
                                        'modalKey' => "editcourse".$course->id
                                    ])
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Company name') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $course->organizer }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Start') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $course->start_date }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('End') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $course->end_date }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-12 py-3">
                <div class="card">
                    <div class="card-header">{{ __('Edit your languages') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store-language', $editUser) }}">
                            @csrf
                            @if($editUser->doctor !== null)
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="lang_key">{{ __('Language') }}</label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('lang_key') is-invalid @enderror" name="lang_key" id="lang_key">
                                            <option selected value="">{{ __('Choose...') }}</option>
                                            @foreach($languages as $language)
                                                <option value="{{ $language->lang_key }}">{{ $language->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('lang_key')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label text-md-right" for="level">{{ __('Level') }}</label>
                                    <div class="col-12 col-md-9">
                                        <select data-live-search="true" class="form-control @error('level') is-invalid @enderror" name="level" id="level">
                                            <option selected value="">{{ __('Choose...') }}</option>
                                            <option value="A1">{{ __('A1') }}</option>
                                            <option value="A2">{{ __('A2') }}</option>
                                            <option value="B1">{{ __('B1') }}</option>
                                            <option value="B2">{{ __('B2') }}</option>
                                            <option value="C1">{{ __('C1') }}</option>
                                            <option value="C2">{{ __('C2') }}</option>
                                        </select>
                                        @error('level')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-left">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>

                        @foreach($userLanguages as $language)
                            <div class="row pt-3">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Language') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $language->language->name }}
                                </div>

                                <div class="col-12 col-md-2 btn-group text-right">

                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalremove{{$language->language->lang_key}}">{{ __('Delete') }}</i>
                                    </button>

                                    @include('partials.confirmation', [
                                        'url' => route('delete-user-language', $language->id),
                                        'method' => 'DELETE',
                                        'title' => "Usuń język",
                                        "description" => "Czy na pewno chcesz usunąć język?",
                                        "description_parameters" => [],
                                        'button' => 'Usuń',
                                        'modalKey' => "remove".$language->language->lang_key
                                    ])

                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#modaleditlang{{$language->language->lang_key}}">{{ __('Edit') }}</i>
                                    </button>

                                    @include('partials.edit-language', [
                                        'url' => route('update-user-language', [$language->language, $editUser]),
                                        'method' => 'PUT',
                                        'title' => "Edycja",
                                        'lang_key' => $language->language->lang_key,
                                        'level' => $language->level,
                                        "description" => "Czy na pewno chcesz zaktualizować język?",
                                        "description_parameters" => [],
                                        'button' => 'Update',
                                        'modalKey' => "editlang".$language->language->lang_key
                                    ])
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Level') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $language->level }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-12 py-3">
                <div class="card">
                    <div class="card-header">{{ __('Edit your preference') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update-preference', $editUser->preference) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Minimum salary') }}</label>
    
                                <div class="col-12 col-md-9">
                                    <input id="min_salary" min="0" type="number" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ $editUser->preference->min_salary }}" autocomplete="min_salary" autofocus>
                                    @error('min_salary')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ __('Currency') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
                                        <option selected value="">{{ __('Choose...') }}</option>
                                        @foreach($currencies as $currency)
                                            @if($editUser->preference->currency_id === $currency->id)
                                                <option value="{{ $currency->id }}" selected>{{ $currency->symbol }}</option>
                                            @else
                                                <option value="{{ $currency->id }}">{{ $currency->symbol }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('currency_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ __('Settlement') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('settlement_id') is-invalid @enderror" name="settlement_id" id="settlement_id">
                                        <option selected value="">{{ __('Choose...') }}</option>
                                        @foreach($settlements as $settlement)
                                            @if($editUser->preference->settlement_id === $settlement->id)
                                                <option value="{{ $settlement->id }}" selected>{{ $settlement->name }}</option>
                                            @else
                                                <option value="{{ $settlement->id }}">{{ $settlement->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('settlement_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ __('Work') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                        <option selected value="">{{ __('Choose...') }}</option>
                                        @foreach($works as $work)
                                            @if($editUser->preference->work_id === $work->id)
                                                <option value="{{ $work->id }}" selected>{{ $work->name }}</option>
                                            @else
                                                <option value="{{ $work->id }}">{{ $work->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('work_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-left">
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
                    <div class="card-header">{{ __('Edit your prefered location') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store-prefered-location', $editUser) }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ __('Location') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="user_location_id" id="user_location_id" required>
                                        <option selected>{{ __('Choose...') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ __('Radius') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('radius') is-invalid @enderror" name="radius" id="radius" required>
                                        <option selected value="">{{ __('Choose...') }}</option>
                                        @foreach($distances as $radius)
                                            <option value="{{ $radius['value'] }}">{{ $radius['label'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('radius')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-left">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        @foreach($userLocations as $location)
                            <div class="row pt-3">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Location') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $location->location->city }}
                                </div>

                                <div class="col-12 col-md-2 btn-group text-right">

                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalremovelocation{{$location->location->id}}">{{ __('Delete') }}</i>
                                    </button>

                                    @include('partials.confirmation', [
                                        'url' => route('delete-user-location', $location->id),
                                        'method' => 'DELETE',
                                        'title' => "Usuń lokalizację",
                                        "description" => "Czy na pewno chcesz usunąć lokalizację?",
                                        "description_parameters" => [],
                                        'button' => 'Usuń',
                                        'modalKey' => "removelocation".$location->location->id
                                    ])

                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#modaleditlocation{{$location->location->id}}">{{ __('Edit') }}</i>
                                    </button>

                                    @include('partials.edit-location', [
                                        'url' => route('update-user-location', [$location->location, $editUser]),
                                        'method' => 'PUT',
                                        'title' => "Edycja",
                                        'location_id' => $location->location_id,
                                        'radius' => $location->radius,
                                        "description" => "Czy na pewno chcesz zaktualizować lokalizację?",
                                        "description_parameters" => [],
                                        'button' => 'Update',
                                        'modalKey' => "editlocation".$location->location->id
                                    ])
                                </div>
                            </div>

                            <div class="row">
                                <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ __('Radius') }}</div>

                                <div class="col-12 col-md-7">
                                    {{ $location->radius }} {{ __('km') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection