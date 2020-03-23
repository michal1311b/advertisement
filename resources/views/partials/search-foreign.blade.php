<div class="col-12">
    <form action="{{ route('search-foreign') }}" method="GET" role="search">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">{{ trans('sentence.search') }}</button>
                        <a href="{{ route('foreign-list') }}" class="btn btn-outline-secondary" id="button-addon2">{{ trans('sentence.clear-search') }}</a>
                    </div>
                    <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_ids">
                        <option selected value="">{{ trans('sentence.choose-spec') }}</option>
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append ml-3">
                        <div class="form-group">
                            <input
                                type="text"
                                id="range"
                                name="range" class="form-group">
                            <label for="range" class="ml-3">
                                {{ trans('sentence.salary') }} <span id="val1" class="font-weight-bold"></span> - <span id="val2" class="font-weight-bold"></span>
                            </label>
                        </div>
                    </div>
                    <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_ids">
                        @foreach($currencies as $currency)
                            <option @if($currency->id === 1) selected @endif
                                value="{{ $currency->id }}">
                                {{ $currency->symbol }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>