<div class="col-12">
    <form action="{{ route('search-advertisement') }}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                        <a href="{{ route('advertisement-list') }}" class="btn btn-outline-secondary" id="button-addon2">Clear search</a>
                    </div>
                    <input type="text" class="form-control" name="q" placeholder="Search advertisement" aria-label="Search advertisement" aria-describedby="button-addon1">
                    <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                        <option selected>Choose location...</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>