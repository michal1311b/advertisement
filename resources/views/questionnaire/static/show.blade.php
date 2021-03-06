@extends('layouts.app')

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
            <img class="d-block w-100" src="{{ asset('images/main2.jpg') }}" alt="Main 2">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('questionnaire.static-quiestionnaire-title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('static.questionnaire.store') }}">
                        @csrf
                        <div class="form-group">
                            <h5><span class="grey">1</span>{{ trans('profile.sex') }}</h5>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="kobieta" id="female" name="sex">
                                <label class="form-check-label radio-label" for="female">
                                    {{ trans('profile.female') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="mężczyzna" id="male" name="sex">
                                <label class="form-check-label radio-label" for="male">
                                    {{ trans('profile.male') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5><span class="grey">2</span>{{ trans('questionnaire.age') }}</h5>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Do 25" id="age1" name="age">
                                <label class="form-check-label radio-label" for="age1">
                                    {{ trans('questionnaire.age1') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="26-35" id="age2" name="age">
                                <label class="form-check-label radio-label" for="age2">
                                    {{ __('26-35') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="36-45" id="age3" name="age">
                                <label class="form-check-label radio-label" for="age3">
                                    {{ __('36-45') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="46-55" id="age4" name="age">
                                <label class="form-check-label radio-label" for="age4">
                                    {{ __('46-55') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="56-65" id="age5" name="age">
                                <label class="form-check-label radio-label" for="age5">
                                    {{ __('56-65') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value=">65" id="age6" name="age">
                                <label class="form-check-label radio-label" for="age6">
                                    {{ __('>65') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="specializations" class="col-12 col-form-label">
                                <h5><span class="grey">3</span>{{ trans('profile.specializations') }}</h5>
                            </label>
                            <div class="col-md-12">
                                <select class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                        id="specializations" name="specialization_id">
                                        <option value="">{{ trans('profile.no-specialization') }}</option>
                                    @foreach ($specializations as $key => $specialization)
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
                            <label for="specializations" class="col-12 col-form-label">
                                <h5><span class="grey">4</span>{{ trans('profile.specializations.pending') }}</h5>
                            </label>
                            <div class="col-md-12">
                                <select class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                                        id="specializationsp" name="specializationp_id">
                                        <option value="">{{ trans('profile.no-specialization') }}</option>
                                    @foreach ($specializations as $key => $specialization)
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

                        <div class="form-group">
                            <h5><span class="grey">5</span>{{ trans('profile.workplace') }}</h5>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Szpital" id="hospital" name="workplace">
                                <label class="form-check-label radio-label" for="hospital">
                                    {{ trans('questionnaire.hospital') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Poradnia specjalistyczna" id="specialist-outpatient-clinic" name="workplace">
                                <label class="form-check-label radio-label" for="specialist-outpatient-clinic">
                                    {{ trans('questionnaire.specialist-outpatient-clinic') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="POZ" id="poz" name="workplace">
                                <label class="form-check-label radio-label" for="poz">
                                    {{ __('POZ') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Prywatna praktyka lekarska" id="private-medical-practice" name="workplace">
                                <label class="form-check-label radio-label" for="private-medical-practice">
                                    {{ trans('questionnaire.private-medical-practice') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <label class="form-check-label radio-label" for="something-else">
                                    {{ trans('questionnaire.something-else') }}
                                </label>
                                <input class="form-control" type="text" value="" id="something-else" name="workplace_extra">
                            </div>
                        </div>

                        <div class="form-group">
                            <h5><span class="grey">6</span>{{ trans('questionnaire.time-to-find-job') }}</h5>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="5-10 min" id="worktime1" name="worktime">
                                <label class="form-check-label radio-label" for="worktime1">
                                    {{ __('5-10 min') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="10-30 min" id="worktime2" name="worktime">
                                <label class="form-check-label radio-label" for="worktime2">
                                    {{ __('10-30 min') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="30-60 min" id="worktime3" name="worktime">
                                <label class="form-check-label radio-label" for="worktime3">
                                    {{ __('30-60 min') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Powyżej 60 min" id="worktime4" name="worktime">
                                <label class="form-check-label radio-label" for="worktime4">
                                    {{ trans('questionnaire.worktime4') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-form-label">
                                <h5><span class="grey">7</span>{{ trans('questionnaire.main-problems-in-medicine') }}</h5>
                            </label>

                            <div class="col-12">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus rows="3">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="criteria" class="col-12 col-form-label">
                                <h5><span class="grey">8</span>{{ trans('questionnaire.main-criteria-to-send-cv') }}</h5>
                            </label>

                            <div class="col-12">
                                <textarea id="criteria" class="form-control @error('criteria') is-invalid @enderror" name="criteria" autocomplete="criteria" autofocus rows="3">
                                    {{ old('criteria') }}
                                </textarea>
                                @error('criteria')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5><span class="grey">9</span>{{ trans('questionnaire.social-media-quiestion') }}</h5>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Facebook" id="facebook" name="social_media">
                                <label class="form-check-label radio-label" for="facebook">
                                    {{ __('Facebook') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Serwisy pośrednictwa pracy" id="job-placement-services" name="social_media">
                                <label class="form-check-label radio-label" for="job-placement-services">
                                    {{ trans('questionnaire.job-placement-services') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Prasa branżowa" id="industry-press" name="social_media">
                                <label class="form-check-label radio-label" for="industry-press">
                                    {{ trans('questionnaire.industry-press') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <input class="form-check-input custom-checkbox" type="radio" value="Konsylium" id="consultation" name="social_media">
                                <label class="form-check-label radio-label" for="consultation">
                                    {{ trans('questionnaire.consultation') }}
                                </label>
                            </div>
                            <div class="form-check radio px-1">
                                <label class="form-check-label radio-label" for="something-else">
                                    {{ trans('questionnaire.something-else') }}
                                </label>
                                <input class="form-control" type="text" value="" id="something-else" name="social_media_extra">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label">
                                <h5><span class="grey">10</span>{{ trans('email.email') }}</h5>
                            </label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input name="term1" type="hidden" value="0">
                                    <input class="form-check-input custom-checkbox" required
                                        type="checkbox" name="term1" id="term1" value="1"
                                        {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label radio-label" for="term1">
                                        {{ trans('sentence.accept') }} <a href="{{ route('regulation.show') }}" class="text-lowercase">{{ trans('sentence.regulation') }}</a> {{ __('EmployMed.eu') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-rounded btn-primary">
                                    {{ trans('email.reply') }}
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
<script></script>
@endsection