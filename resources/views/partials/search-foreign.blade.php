<form action="{{ route('search-foreign') }}" method="GET" role="search">
    {{ csrf_field() }}
    <article class="card-group-item">
        <div class="filter-content">
            <div class="card-body">
                <div class="input-group-append mx-3">
                    <div class="form-group">
                        <input
                            type="text"
                            id="range"
                            name="range" class="form-group">
                        <label for="range" class="ml-3">
                            {{ trans('offer.salary') }} <span id="val1" class="font-weight-bold"></span> - <span id="val2" class="font-weight-bold"></span>
                        </label>

                        <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_ids">
                            @foreach($currencies as $currency)
                                <option @if($currency->id === 1) selected @endif
                                    value="{{ $currency->id }}">
                                    {{ $currency->symbol }}
                                </option>
                            @endforeach
                        </select>
                        <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_ids">
                            <option selected value="">{{ trans('sentence.choose-spec') }}</option>
                            @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-rounded btn-outline-secondary" type="submit" id="button-addon1">{{ trans('buttons.search') }}</button>
                            <a href="{{ route('advertisement-list') }}" class="btn btn-rounded btn-outline-secondary" id="button-addon2">{{ trans('buttons.clear-search') }}</a>
                        </div>
                    </div>
                </div>
            </div> <!-- card-body.// -->
        </div>
    </article> <!-- card-group-item.// -->
</form>