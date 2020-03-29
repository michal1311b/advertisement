<div class="tab-pane container fade" id="menu4">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ trans('profile.edit-preference') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('update-preference', $editUser->preference) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ trans('offer.settlement') }}</label>
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
                        <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('offer.min_salary') }}</label>

                        <div class="col-12 col-md-3">
                            <input id="min_salary" min="0" type="number" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ $editUser->preference->min_salary }}" autocomplete="min_salary" autofocus>
                            @error('min_salary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ trans('offer.currency') }}</label>
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
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ trans('offer.work-category') }}</label>
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