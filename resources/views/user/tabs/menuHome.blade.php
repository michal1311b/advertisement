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
                        <label for="company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_name') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $editUser->profile->company_name }}" autocomplete="company_name" autofocus>
                            @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_street') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street" value="{{ $editUser->profile->company_street }}" autocomplete="company_street" autofocus>
                            @error('company_street')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_post_code" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_post_code') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_post_code" type="text" class="form-control @error('company_post_code') is-invalid @enderror" name="company_post_code" value="{{ $editUser->profile->company_post_code }}" autocomplete="company_post_code" autofocus>
                            @error('company_post_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_city') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ $editUser->profile->company_city }}" autocomplete="company_city" autofocus>
                            @error('company_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_nip" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_nip') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_nip" type="number" class="form-control @error('company_nip') is-invalid @enderror" name="company_nip" value="{{ $editUser->profile->company_nip }}" autocomplete="company_nip" autofocus>
                            @error('company_nip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_phone1" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_phone') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_phone1" type="number" class="form-control @error('company_phone1') is-invalid @enderror" name="company_phone1" value="{{ $editUser->profile->company_phone1 }}" autocomplete="company_phone1" autofocus>
                            @error('company_phone1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="company_phone2" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_extra_phone') }}</label>

                        <div class="col-12 col-md-9">
                            <input id="company_phone2" type="number" class="form-control @error('company_phone2') is-invalid @enderror" name="company_phone2" value="{{ $editUser->profile->company_phone2 }}" autocomplete="company_phone2" autofocus>
                            @error('company_phone2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if($editUser->finishedSpecializations && ($editUser->doctor !== null || $editUser->nurse !== null))
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

                        @if($editUser->doctor !== null)
                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                        <option>{{ trans('sentence.choose') }}</option>
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
                        @elseif($editUser->nurse !== null)
                            <div class="form-group row">
                                <label class="col-12 col-md-3 col-form-label text-md-right" for="sex">{{ trans('sentence.sex') }}</label>
                                <div class="col-12 col-md-9">
                                    <select data-live-search="true" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                        <option>{{ trans('sentence.choose') }}</option>
                                        <option 
                                            @if($editUser->nurse->sex === 'male') 
                                            selected
                                            @endif 
                                            value="male">{{ trans('sentence.male') }}</option>
                                        <option 
                                            @if($editUser->nurse->sex === 'female') 
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
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-left">
                            <button type="submit" class="btn btn-rounded btn-success">
                                {{ trans('buttons.btn-update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>