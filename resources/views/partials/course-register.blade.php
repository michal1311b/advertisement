<div class="card">
    <div class="card-header">{{ trans('sentence.contact-form') }}</div>
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <form method="POST" action="{{ route('store-participant', $course) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required value="{{ auth()->user()->email ?? null }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name">{{ trans('sentence.first_name')}}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required value="{{ auth()->user()->name ?? null }}">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="last_name">{{ trans('sentence.last_name') }}</label>
                        <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="" required value="{{ auth()->user()->profile->last_name ?? null }}">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="street">{{ trans('sentence.street')}}</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="" required value="{{ auth()->user()->profile->street ?? null }}">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">{{ trans('sentence.city')}}</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->profile->city ?? null }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="post_code">{{ trans('sentence.post_code')}}</label>
                        <input type="text" class="form-control" id="post_code" name="post_code" value="{{ auth()->user()->profile->post_code ?? null }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">{{ trans('sentence.phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? null }}">
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
                        <label for="company_nip">{{ trans('sentence.company_nip') }}</label>
                        <input type="company_nip" class="form-control" id="company_nip" name="company_nip" placeholder="" required value="{{ auth()->user()->profile->company_nip ?? null }}">
                        @error('company_nip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_name">{{ trans('sentence.company_name') }}</label>
                        <input type="company_name" class="form-control" id="company_name" name="company_name" placeholder="" required value="{{ auth()->user()->profile->company_name ?? null }}">
                        @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_street">{{ trans('sentence.company_street')}}</label>
                        <input type="text" class="form-control" id="company_street" name="company_street" placeholder="" required value="{{ auth()->user()->profile->company_street ?? null }}">
                        @error('company_street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="company_city">{{ trans('sentence.company_city')}}</label>
                        <input type="text" class="form-control" id="company_city" name="company_city" value="{{ auth()->user()->profile->company_city ?? null }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_post_code">{{ trans('sentence.company_post_code')}}</label>
                        <input type="text" class="form-control" id="company_post_code" name="company_post_code" value="{{ auth()->user()->profile->company_post_code ?? null }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="company_phone">{{ trans('sentence.company_phone')}}</label>
                        <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="" value="{{ auth()->user()->profile->company_phone1 ?? null }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="comments">{{ trans('sentence.comments')}}</label>
                        <textarea class="form-control text-left @error('comments') is-invalid @enderror" name="comments" autocomplete="comments" autofocus rows="5"></textarea>
                        @error('comments')
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
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('sentence.send')}}</button>
        </form>
    </div>
</div>