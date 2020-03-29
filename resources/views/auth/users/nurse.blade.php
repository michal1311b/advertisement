<div class="tab-pane fade show" id="nurse" role="tabpanel" aria-labelledby="nurse-tab">
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <input id="type" type="hidden" class="form-control" name="type" value="nurse" required autocomplete="type" autofocus>
                <label for="pwz" class="col-md-4 col-form-label text-md-right">{{ __('PWZ') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-md-6">
                    <input id="pwz" type="text" class="form-control @error('pwz') is-invalid @enderror" name="pwz" value="{{ old('pwz') }}" required autocomplete="pwz" autofocus>

                    @error('pwz')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.birthday') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-md-6">
                    <input id="birthday_n" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                    @error('birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('sentence.first_name') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                <label class="col-md-4 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }} <span class="text-danger font-weight-bolder">*</span></label>
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
                            id="specializations_n" name="specializations[]">
                        @foreach ($specializations as $key => $specialization)
                            @if($specialization->type == 3 || $specialization->type == 0)
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
                <label for="specializationsp" class="col-md-4 col-form-label text-md-right">{{trans('sentence.specializations.pending')}}</label>
                <div class="col-md-6">
                    <select multiple="multiple"
                            class="form-control{{ $errors->has('specializations') ? ' is-invalid' : '' }}"
                            id="specializations_np" name="specializationsp[]">
                        @foreach ($specializations as $key => $specialization)
                            @if($specialization->type == 3 || $specialization->type == 0)
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
                <label class="col-md-4 col-form-label text-md-right" for="work_id">{{ trans('offer.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-md-6">
                    <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                        <option selected value="">{{ trans('sentence.choose') }}</option>
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
                <label class="col-md-4 col-form-label text-md-right" for="settlement_id">{{ trans('offer.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-md-6">
                    <select data-live-search="true" class="form-control @error('settlement_id') is-invalid @enderror" name="settlement_id" id="settlement_id">
                        <option selected value="">{{ trans('sentence.choose') }}</option>
                        @foreach($settlements as $settlement)
                            <option {{ old('settlement_id') == $settlement->id ? 'selected' : '' }} value="{{ $settlement->id }}">{{ $settlement->name }}</option>
                        @endforeach
                    </select>
                    @error('settlement_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="min_salary"  class="col-md-4 col-form-label text-md-right">{{ trans('offer.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

                <div class="col-md-6">
                    <input id="min_salary" min="0" type="number" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="" required autocomplete="min_salary" autofocus>
                    @error('min_salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="settlement_id">{{ trans('offer.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-md-6">
                    <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
                        <option selected value="">{{ trans('sentence.choose') }}</option>
                        @foreach($currencies as $currency)
                            <option {{ old('currency_id') == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->symbol }}</option>
                         @endforeach
                    </select>
                    @error('currency_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="user_location_id">{{ trans('offer.location') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-md-6">
                    <select data-live-search="true" class="form-control @error('user_location_id') is-invalid @enderror" name="user_location_id" id="user_location_id" required>
                        <option selected>{{ trans('sentence.choose') }}</option>
                        @foreach($locations as $location)
                            <option {{ old('user_location_id') == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->city }}</option>
                        @endforeach
                    </select>
                    @error('user_location_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="radius">{{ trans('sentence.radius') }} <span class="text-danger font-weight-bolder">*</span></label>
                <div class="col-md-6">
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

            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input name="term1" type="hidden" value="0">
                        <input class="form-check-input custom-checkbox" required
                        type="checkbox" name="term1" id="term1n" value="1"
                        {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="term1n">
                        {{ trans('sentence.accept') }} <a href="{{ route('regulation.show') }}" class="text-lowercase">{{ trans('sentence.regulation') }}</a> {{ __('EmployMed.eu') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input name="term2" type="hidden" value="0">
                        <input class="form-check-input custom-checkbox" required
                        type="checkbox" name="term2" id="term2n" value="1"
                        {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="term2n">
                            {{ trans('sentence.accept') }} <a href="{{ route('cookies.show') }}" class="text-lowercase">{{ trans('sentence.cookies-policy') }}</a> {{ __('EmployMed.eu') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input name="term3" type="hidden" value="0">
                        <input class="form-check-input custom-checkbox" required
                        type="checkbox" name="term3" id="term3n" value="1"
                        {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="term3n">
                            {{ trans('sentence.data-conversion') }} {{ __('EmployMed.eu') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-12">
                    <button type="submit" class="btn btn-rounded btn-primary">
                        {{ trans('sentence.register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>