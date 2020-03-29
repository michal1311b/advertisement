<form action="{{ $url }}" method="POST">
    @csrf
    @method($method)
    <div class="modal fade" id="modal{{$modalKey}}" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__($title)}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-content">
                    <div class="col-12">
                        <p class="float-left">{!!__($description, $description_parameters)!!}</p>
                    </div>

                    <label for="location_id" class="col-12 col-form-label">{{ trans('offer.location')}}</label>

                    <div class="col-12">
                        <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                            @foreach($locations as $location)
                                <option 
                                    @if($location->id === $location_id)
                                        selected
                                    @endif
                                    value="{{ $location->id }}">
                                    {{ $location->city }}
                                </option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="radius" class="col-12 col-form-label">{{ trans('sentence.radius')}}</label>

                    <div class="col-12">
                        <select data-live-search="true" class="form-control @error('radius') is-invalid @enderror" name="radius" id="radius">
                            @foreach($distances as $rad)
                                <option @if($rad['value'] === $radius) selected @endif value="{{ $rad['value'] }}">{{ $rad['label'] }}</option>
                            @endforeach
                        </select>
                        @error('radius')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-sm btn-primary" data-dismiss="modal">{{ trans('buttons.btn-cancel')}}</button>
                    <button type="submit" class="btn btn-rounded btn-sm btn-success">{{__($button)}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
        