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

        @if($editUser->doctor)
            <div class="col-md-12 text-right">
                <form method="POST" action="{{ route('share-profile', $editUser) }}">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <button type="submit" class="btn {{ $editUser->doctor->share ? 'btn-danger' : 'btn-primary' }}">
                        {{ $editUser->doctor->share ? trans('sentence.btn-unshare') : trans('sentence.btn-share') }}
                    </button>
                </form>
            </div>
        @endif

        @if($editUser->doctor)
            @if(
                count($userLocations) == 0 ||
                ($editUser->preference->work_id == null ||
                $editUser->preference->settlement_id == null ||
                $editUser->preference->currency_id == null ||
                $editUser->preference->min_salary == null))
                <div class="col-md-12 text-center">
                    <div class="alert alert-info">
                        {!! trans('sentence.matching-info') !!}
                    </div>
                </div>
            @endif
        @endif

        <div class="col-md-12 py-3">
              <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">{{ __('Home') }}</a>
                </li>
                @if($editUser->doctor)
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu1">
                            {{ trans('sentence.experience') }} 
                            @if(count($editUser->experiences) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.fill-experience') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu2">
                            {{ trans('sentence.courses') }} 
                            @if(count($editUser->courses) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.fill-courses') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu3">
                            {{ trans('sentence.languages') }} 
                            @if(count($userLanguages) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.fill-languages') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu4">
                            {{ trans('sentence.preferences') }} 
                            @if(
                                !$editUser->preference->work_id ||
                                !$editUser->preference->settlement_id ||
                                !$editUser->preference->currency_id ||
                                !$editUser->preference->min_salary)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.fill-preferences') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu4a">
                            {{ trans('sentence.locations') }} 
                            @if(count($userLocations) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.fill-locations') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu5">
                            {{ __('CV') }} 
                            @if($editUser->doctor->cv === null)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('sentence.add-cv') }}">!</span>
                            @endif
                        </a>
                    </li>
                @endif
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="home">
                    <div class="col-md-12 py-3">
                        <div class="card">
                            <div class="card-header">{{ trans('sentence.edit-profile') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('update-user', $editUser) }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    
                                    <div class="form-group row">
                                        <label class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.profile-image') }}</label>
            
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
                                        <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ $editUser->doctor ? trans('sentence.first_name') : trans('sentence.name') }}</label>
            
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
                                        <label for="password" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.password') }}</label>
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
                                        <label for="last_name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.last_name') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $editUser->profile->last_name }}" autocomplete="last_name" autofocus>
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.street') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $editUser->profile->street }}" autocomplete="street" autofocus>
                                            @error('street')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="post_code" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.post_code') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ $editUser->profile->post_code }}" autocomplete="post_code" autofocus>
                                            @error('post_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.city') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $editUser->profile->city }}" autocomplete="city" autofocus>
                                            @error('city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_name') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $editUser->profile->company_name }}" autocomplete="company_name" autofocus>
                                            @error('company_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_street') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street" value="{{ $editUser->profile->company_street }}" autocomplete="company_street" autofocus>
                                            @error('company_street')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_post_code" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_post_code') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_post_code" type="text" class="form-control @error('company_post_code') is-invalid @enderror" name="company_post_code" value="{{ $editUser->profile->company_post_code }}" autocomplete="company_post_code" autofocus>
                                            @error('company_post_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_city') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ $editUser->profile->company_city }}" autocomplete="company_city" autofocus>
                                            @error('company_city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_nip" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_nip') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_nip" type="number" class="form-control @error('company_nip') is-invalid @enderror" name="company_nip" value="{{ $editUser->profile->company_nip }}" autocomplete="company_nip" autofocus>
                                            @error('company_nip')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_phone1" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_phone') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_phone1" type="number" class="form-control @error('company_phone1') is-invalid @enderror" name="company_phone1" value="{{ $editUser->profile->company_phone1 }}" autocomplete="company_phone1" autofocus>
                                            @error('company_phone1')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="company_phone2" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_extra_phone') }}</label>
            
                                        <div class="col-12 col-md-9">
                                            <input id="company_phone2" type="number" class="form-control @error('company_phone2') is-invalid @enderror" name="company_phone2" value="{{ $editUser->profile->company_phone2 }}" autocomplete="company_phone2" autofocus>
                                            @error('company_phone2')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    @if($editUser->finishedSpecializations && $editUser->doctor !== null)
                                        <div class="form-group row">
                                            <label for="specializations" class="col-12 col-md-3 col-form-label text-md-right">{{trans('sentence.specializations')}}</label>
                                            <div class="col-12 col-md-9">
                                                <select multiple="multiple"
                                                        class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                        id="specializations" name="specializations[]">
                                                    @foreach ($specializations as $key => $specialization)
                                                        @if(in_array($specialization->id, $editUser->finishedSpecializations->pluck('id')->toArray()))
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
                                            <label for="specializationsp" class="col-12 col-md-3 col-form-label text-md-right">{{trans('sentence.specializations.pending')}}</label>
                                            <div class="col-12 col-md-9">
                                                <select multiple="multiple"
                                                        class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                                        id="specializationsp" name="specializationsp[]">
                                                    @foreach ($specializations as $key => $specialization)
                                                        @if(in_array($specialization->id, $editUser->pendingSpecializations->pluck('id')->toArray()))
                                                            <option value="{{ $specialization->id }}"
                                                            selected>{{ $specialization->name }}</option>
                                                        @else
                                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('specializationsp'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{  $errors->first('specializations') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }}</label>
                                            <div class="col-12 col-md-9">
                                                <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                                    <option selected>{{ trans('sentence.choose') }}</option>
                                                    <option 
                                                        @if($editUser->doctor->sex === 'male') 
                                                        selected
                                                        @endif 
                                                        value="male">{{ trans('sentence.male') }}</option>
                                                    <option 
                                                        @if($editUser->doctor->sex === 'female') 
                                                        selected
                                                        @endif 
                                                        value="female">{{ trans('sentence.female') }}</option>
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
                                                {{ trans('sentence.btn-update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if($editUser->doctor)
                    <div class="tab-pane container fade" id="menu1">
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ trans('sentence.edit-experience') }}</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('store-experience', $editUser) }}">
                                        @csrf
                                        @if($editUser->doctor !== null)
                                            <div class="form-group row">
                                                <label for="workplace" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.workplace') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ $experience->workplace ?? '' }}" autocomplete="workplace" autofocus>
                                                    @error('workplace')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="exp_company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.company_name') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="exp_company_name" type="text" class="form-control @error('exp_company_name') is-invalid @enderror" name="exp_company_name" value="{{ $experience->exp_company_name ?? '' }}" autocomplete="exp_company_name" autofocus>
                                                    @error('exp_company_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="exp_city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.city') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="exp_city" type="text" class="form-control @error('exp_city') is-invalid @enderror" name="exp_city" value="{{ $experience->exp_city ?? '' }}" autocomplete="exp_city" autofocus>
                                                    @error('exp_city')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.start_date') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $experience->start_date ?? '' }}" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                                    @error('start_date')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.end_date') }}</label>
            
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
                                                        {{ trans('sentence.until') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="responsibility" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.responsibilities') }}</label>
            
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
                                                        {{ trans('sentence.btn-add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
            
                                    @foreach($editUser->experiences as $experience)
                                        <div class="row pt-3">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.workplace') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $experience->workplace }}
                                            </div>
            
                                            <div class="col-12 col-md-2 btn-group text-right">
            
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalremove{{$experience->id}}">{{trans('sentence.btn-delete')}}</i>
                                                </button>
            
                                                @include('partials.confirmation', [
                                                    'url' => route('delete-experience', $experience->id),
                                                    'method' => 'DELETE',
                                                    'title' => trans('sentence.btn-delete') . " " . trans('sentence.experience'),
                                                    "description" => trans('sentence.delete_confirm') . " " . trans('sentence.experience') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-delete'),
                                                    'modalKey' => "remove".$experience->id
                                                ])
            
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modaledit{{$experience->id}}">{{trans('sentence.btn-edit')}}</i>
                                                </button>
            
                                                @include('partials.edit', [
                                                    'url' => route('update-experience', $experience),
                                                    'method' => 'PUT',
                                                    'title' => trans('sentence.edit'),
                                                    "description" => "Czy na pewno chcesz zaktualizować doświadczenie?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-edit'),
                                                    'modalKey' => "edit".$experience->id
                                                ])
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.company_name') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $experience->exp_company_name }}
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.city') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $experience->exp_city }}
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.start') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $experience->start_date }}
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.end') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                @if($experience->end_date)
                                                    {{ $experience->end_date }}
                                                @else
                                                    {{ __('Until now') }}
                                                @endif
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.responsibilities') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {!! $experience->responsibility !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu2">
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ trans('sentence.edit-courses') }}</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('store-course', $editUser) }}">
                                        @csrf
                                        @if($editUser->doctor !== null)
                                            <div class="form-group row">
                                                <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.name') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" autocomplete="name" autofocus>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="organizer" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.organizer') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" value="" autocomplete="organizer" autofocus>
                                                    @error('organizer')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.start_date') }}</label>
            
                                                <div class="col-12 col-md-9">
                                                    <input id="start_course" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                                    @error('start_date')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.end_date') }}</label>
            
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
                                                        {{ trans('sentence.btn-add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
            
                                    @foreach($editUser->courses as $course)
                                        <div class="row pt-3">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.name') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $course->name }}
                                            </div>
            
                                            <div class="col-12 col-md-2 btn-group text-right">
            
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalremovecourse{{$course->id}}">{{ trans('sentence.btn-delete') }}</i>
                                                </button>
            
                                                @include('partials.confirmation', [
                                                    'url' => route('delete-course', $course->id),
                                                    'method' => 'DELETE',
                                                    'title' => trans('sentence.btn-delete') . " " . trans('sentence.course'),
                                                    "description" => trans('sentence.delete_confirm') . " " . trans('sentence.course') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-delete'),
                                                    'modalKey' => "removecourse".$course->id
                                                ])
            
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modaleditcourse{{$course->id}}">{{ trans('sentence.btn-edit') }}</i>
                                                </button>
            
                                                @include('partials.edit-course', [
                                                    'url' => route('update-course', $course),
                                                    'method' => 'PUT',
                                                    'title' => trans('sentence.edit'),
                                                    "description" => trans('sentence.edit_confirm') . " " . trans('sentence.course') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-edit'),
                                                    'modalKey' => "editcourse".$course->id
                                                ])
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.company_name') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $course->organizer }}
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.start') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $course->start_date }}
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.end') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $course->end_date }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu3">
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ trans('sentence.edit-language') }}</div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('store-language', $editUser) }}">
                                        @csrf
                                        @if($editUser->doctor !== null)
                                            <div class="form-group row">
                                                <label class="col-12 col-md-3 col-form-label text-md-right" for="lang_key">{{ trans('sentence.language') }}</label>
                                                <div class="col-12 col-md-9">
                                                    <select data-live-search="true" class="form-control @error('lang_key') is-invalid @enderror" name="lang_key" id="lang_key">
                                                        <option selected value="">{{ trans('sentence.choose') }}</option>
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
                                                <label class="col-12 col-md-3 col-form-label text-md-right" for="level">{{ trans('sentence.level') }}</label>
                                                <div class="col-12 col-md-9">
                                                    <select data-live-search="true" class="form-control @error('level') is-invalid @enderror" name="level" id="level">
                                                        <option selected value="">{{ trans('sentence.choose') }}</option>
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
                                                        {{ trans('sentence.btn-add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
            
                                    @foreach($userLanguages as $language)
                                        <div class="row pt-3">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.language') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $language->language->name }}
                                            </div>
            
                                            <div class="col-12 col-md-2 btn-group text-right">
            
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalremove{{$language->language->lang_key}}">{{ trans('sentence.btn-delete') }}</i>
                                                </button>
            
                                                @include('partials.confirmation', [
                                                    'url' => route('delete-user-language', $language->id),
                                                    'method' => 'DELETE',
                                                    'title' => trans('sentence.btn-delete') . " " . trans('sentence.language'),
                                                    "description" => trans('sentence.delete_confirm') . " " . trans('sentence.language') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-delete'),
                                                    'modalKey' => "remove".$language->language->lang_key
                                                ])
            
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modaleditlang{{$language->language->lang_key}}">{{ trans('sentence.edit') }}</i>
                                                </button>
            
                                                @include('partials.edit-language', [
                                                    'url' => route('update-user-language', [$language->language, $editUser]),
                                                    'method' => 'PUT',
                                                    'title' => trans('sentence.edit'),
                                                    'lang_key' => $language->language->lang_key,
                                                    'level' => $language->level,
                                                    "description" => trans('sentence.edit_confirm') . " " . trans('sentence.language') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-edit'),
                                                    'modalKey' => "editlang".$language->language->lang_key
                                                ])
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.level') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $language->level }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu4">
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ trans('sentence.edit-preference') }}</div>
                
                                <div class="card-body">
                                    <form method="POST" action="{{ route('update-preference', $editUser->preference) }}" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ trans('sentence.settlement') }}</label>
                                            <div class="col-12 col-md-9">
                                                <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                                    <option selected value="">{{ trans('sentence.choose') }}</option>
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

                                        <div class="form-group row">
                                            <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.min_salary') }}</label>
                
                                            <div class="col-12 col-md-3">
                                                <input id="min_salary" min="0" type="number" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ $editUser->preference->min_salary }}" autocomplete="min_salary" autofocus>
                                                @error('min_salary')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ trans('sentence.currency') }}</label>
                                            <div class="col-12 col-md-3">
                                                <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
                                                    <option selected value="">{{ trans('sentence.choose') }}</option>
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
                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ trans('sentence.work-category') }}</label>
                                            <div class="col-12 col-md-9">
                                                <select data-live-search="true" class="form-control @error('settlement_id') is-invalid @enderror" name="settlement_id" id="settlement_id">
                                                    <option selected value="">{{ trans('sentence.choose') }}</option>
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
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 text-left">
                                                <button type="submit" class="btn btn-success">
                                                    {{ trans('sentence.btn-update') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu4a">
                    
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ trans('sentence.edit-prefered-location') }}</div>
                
                                <div class="card-body">
                                    <form method="POST" action="{{ route('store-prefered-location', $editUser) }}">
                                        @csrf
            
                                        <div class="form-group row">
                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ trans('sentence.location') }}</label>
                                            <div class="col-12 col-md-9">
                                                <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="user_location_id" id="user_location_id" required>
                                                    <option selected>{{ trans('sentence.choose') }}</option>
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
                                            <label class="col-12 col-md-3 col-form-label text-md-right" for="radius">{{ trans('sentence.radius') }}</label>
                                            <div class="col-12 col-md-9">
                                                <select data-live-search="true" class="form-control @error('radius') is-invalid @enderror" name="radius" id="radius" required>
                                                    <option selected value="">{{ trans('sentence.choose') }}</option>
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
                                                    {{ trans('sentence.btn-add') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
            
                                    @foreach($userLocations as $location)
                                        <div class="row pt-3">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.location') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $location->location->city }}
                                            </div>
            
                                            <div class="col-12 col-md-2 btn-group text-right">
            
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalremovelocation{{$location->location->id}}">{{ trans('sentence.btn-delete') }}</i>
                                                </button>
            
                                                @include('partials.confirmation', [
                                                    'url' => route('delete-user-location', $location->id),
                                                    'method' => 'DELETE',
                                                    'title' => trans('sentence.btn-delete'). " " . trans('sentence.location'),
                                                    "description" => trans('sentence.delete_confirm') . " " . trans('sentence.location') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-delete'),
                                                    'modalKey' => "removelocation".$location->location->id
                                                ])
            
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#modaleditlocation{{$location->location->id}}">{{ trans('sentence.edit') }}</i>
                                                </button>
            
                                                @include('partials.edit-location', [
                                                    'url' => route('update-user-location', [$location->location, $editUser]),
                                                    'method' => 'PUT',
                                                    'title' => trans('sentence.edit'),
                                                    'location_id' => $location->location_id,
                                                    'radius' => $location->radius,
                                                    "description" => trans('sentence.edit_confirm') . " " . trans('sentence.location') . "?",
                                                    "description_parameters" => [],
                                                    'button' => trans('sentence.btn-edit'),
                                                    'modalKey' => "editlocation".$location->location->id
                                                ])
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.radius') }}</div>
            
                                            <div class="col-12 col-md-7">
                                                {{ $location->radius }} {{ __('km') }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu5">
                        <div class="col-md-12 py-3">
                            <div class="card">
                                <div class="card-header">{{ __('CV') }}</div>

                                <div class="card-body">
                                    @if($editUser->doctor->cv !== null)
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ $editUser->doctor->cv }}" class="btn btn-primary" target="_blank">{{ trans('sentence.show-cv') }}</a>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalremovecv{{$editUser->doctor->id}}">{{ trans('sentence.btn-delete') }}</i>
                                            </button>

                                            @include('partials.confirmation', [
                                                'url' => route('delete-user-cv', $editUser->doctor),
                                                'method' => 'DELETE',
                                                'title' => trans('sentence.btn-delete') . " CV",
                                                "description" => trans('sentence.delete_confirm') ." CV?",
                                                "description_parameters" => [],
                                                'button' => trans('sentence.btn-delete'),
                                                'modalKey' => "removecv".$editUser->doctor->id
                                            ])
                                        </div>
                                    @else
                                        <div class="dropzone-previews"></div>
                                        <form method="POST" action="{{ route('upload-cv') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <div class="pb-3">{{ trans('sentence.add-cv-file') }}</div>
                                                    <input type="file" class="dropzone" id="dropzone" name="cv">

                                                    <div id="template-preview">
                                                        <div class="dz-preview dz-file-preview well" id="dz-preview-template">
                                                            <div class="dz-details">
                                                                <div class="dz-filename">
                                                                    <span data-dz-name></span>
                                                                </div>
                                                                <div class="dz-size" data-dz-size></div>
                                                            </div>
                                                            <div class="dz-progress">
                                                                <span class="dz-upload" data-dz-uploadprogress></span>
                                                            </div>
                                                            <div class="dz-success-mark"><span></span></div>
                                                            <div class="dz-error-mark"><span></span></div>
                                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ trans('sentence.btn-upload') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script></script>
@endsection