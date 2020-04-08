<div class="card">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('live.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="company_name">{{ trans('company.company_name')}}</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" required value="{{ auth()->user()->name ?? null }}">
                        @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">
                            {{ trans('live.status') }}
                        </label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option selected>{{ trans('sentence.choose') }}</option>
                            <option value="1">{{ trans('live.employs') }}</option>
                            <option value="2">{{ trans('live.waiting') }}</option>
                            <option value="3">{{ trans('live.releases') }}</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">{{ trans('company.company_city')}}</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->profile->city ?? null }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="link">{{ trans('live.link')}}</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="" value="{{ auth()->user()->profile->company_link1 ?? null }}">
                    </div>
                </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="comment">{{ trans('email.message')}}</label>
                    <textarea class="form-control text-left @error('comment') is-invalid @enderror" name="comment" autocomplete="comment" autofocus rows="5"></textarea>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-rounded btn-primary">{{ trans('email.send')}}</button>
        </form>
    </div>
</div>