<div class="card">
    <div class="card-header">{{ trans('email.contact-form') }}</div>
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <form method="POST" action="{{ route('store-participant', $course->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email"><i class="fas fa-at"></i>&nbsp;{{ trans('email.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required value="{{ auth()->user()->email ?? old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name"><i class="fas fa-user-circle"></i>&nbsp;{{ trans('profile.first_name')}}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required value="{{ auth()->user()->name ?? old('first_name') }}">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="last_name"><i class="far fa-user-circle"></i>&nbsp;{{ trans('profile.last_name')}}</label>
                        <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="" required value="{{ auth()->user()->profile->last_name ?? old('last_name') }}">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="street"><i class="fas fa-road"></i>&nbsp;{{ trans('offer.street')}}</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="" required value="{{ auth()->user()->profile->street ?? old('street') }}">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city"><i class="fas fa-city"></i>&nbsp;{{ trans('offer.city')}}</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->profile->city ?? old('city') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="post_code"><i class="fas fa-map-marked"></i>&nbsp;{{ trans('offer.post_code')}}</label>
                        <input type="text" class="form-control" id="post_code" name="post_code" value="{{ auth()->user()->profile->post_code ?? old('post_code') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone"><i class="fas fa-phone"></i>&nbsp;{{ trans('offer.phone') }}</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? old('phone') }}">
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div>{{ trans('sentence.invoice-data') }}</div>
                <small class="text-danger font-weight-bold">{{ trans('sentence.invoice-data-info') }}</small>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="company_nip"><i class="fas fa-id-badge"></i>&nbsp;<i class="fas fa-id-badge"></i>&nbsp;{{ trans('company.company_nip') }}</label>
                        <input type="company_nip" class="form-control" id="company_nip" name="company_nip" placeholder="" required value="{{ auth()->user()->profile->company_nip ?? old('company_nip') }}">
                        @error('company_nip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_name"><i class="fas fa-building"></i>&nbsp;{{ trans('company.company_name') }}</label>
                        <input type="company_name" class="form-control" id="company_name" name="company_name" placeholder="" required value="{{ auth()->user()->profile->company_name ?? old('company_name') }}">
                        @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_street"><i class="fas fa-road"></i>&nbsp;{{ trans('company.company_street')}}</label>
                        <input type="text" class="form-control" id="company_street" name="company_street" placeholder="" required value="{{ auth()->user()->profile->company_street ?? old('company_street') }}">
                        @error('company_street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="company_city"><i class="fas fa-city"></i>&nbsp;{{ trans('company.company_city')}}</label>
                        <input type="text" class="form-control" id="company_city" name="company_city" value="{{ auth()->user()->profile->company_city ?? old('company_city') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_post_code"><i class="fas fa-map-marked"></i>&nbsp;{{ trans('company.company_post_code')}}</label>
                        <input type="text" class="form-control" id="company_post_code" name="company_post_code" value="{{ auth()->user()->profile->company_post_code ?? old('company_post_code') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_phone"><i class="fas fa-phone"></i>&nbsp;{{ trans('company.company_phone')}}</label>
                        <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? old('company_phone') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="comments"><i class="fas fa-comments"></i>&nbsp;{{ trans('sentence.comments')}}</label>
                        <textarea class="form-control text-left @error('comments') is-invalid @enderror" name="comments" autocomplete="comments" autofocus rows="5"></textarea>
                        @error('comments')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="form-check">
                        <input name="term1" type="hidden" value="0">
                        <input class="form-check-input custom-checkbox" value="1" required
                        type="checkbox" name="term1" {{ old('term1', 0) == 1 ? 'checked' : '' }}
                        id="term1">
    
                        <label class="form-check-label" for="term1">
                            {{ trans('sentence.rodo-term') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-rounded btn-primary">
                        {{ trans('email.send')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>