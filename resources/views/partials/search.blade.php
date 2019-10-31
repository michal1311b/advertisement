<div class="col-12">
    <form action="{{ route('search-advertisement') }}" method="GET" role="search">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">{{ __('Search') }}</button>
                        <a href="{{ route('advertisement-list') }}" class="btn btn-outline-secondary" id="button-addon2">{{ __('Clear search') }}</a>
                    </div>
                    <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_id">
                        <option selected value="">{{ __('Choose specialization...') }}</option>
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                        <option selected value="">{{ __('Choose location...') }}</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <input
                            type="text"
                            id="range"
                            name="range">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>