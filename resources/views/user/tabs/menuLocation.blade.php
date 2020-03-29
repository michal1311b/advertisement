<div class="tab-pane container fade" id="menu4a">
                    
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ trans('sentence.edit-prefered-location') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('store-prefered-location', $editUser) }}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ trans('offer.location') }}</label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="user_location_id" id="user_location_id" required>
                                <option selected>{{ trans('sentence.choose') }}</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->city }}</option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-md-3 col-form-label text-md-right" for="radius">{{ trans('sentence.radius') }}</label>
                        <div class="col-12 col-md-9">
                            <select data-live-search="true" class="form-control @error('radius') is-invalid @enderror" name="radius" id="radius" required>
                                <option selected value="">{{ trans('sentence.choose') }}</option>
                                @foreach($distances as $radius)
                                    <option value="{{ $radius['value'] }}">{{ $radius['label'] }}</option>
                                @endforeach
                            </select>
                            @error('radius')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-left">
                            <button type="submit" class="btn btn-rounded btn-success">
                                {{ trans('buttons.btn-add') }}
                            </button>
                        </div>
                    </div>
                </form>

                @foreach($userLocations as $location)
                    <div class="row pt-3">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('offer.location') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $location->location->city }}
                        </div>

                        <div class="col-12 col-md-2 btn-group text-right">

                            <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                data-target="#modalremovelocation{{$location->location->id}}">{{ trans('buttons.btn-delete') }}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-user-location', $location->id),
                                'method' => 'DELETE',
                                'title' => trans('buttons.btn-delete'). " " . trans('offer.location'),
                                "description" => trans('sentence.delete_confirm') . " " . trans('offer.location') . "?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-delete'),
                                'modalKey' => "removelocation".$location->location->id
                            ])

                            <button class="btn btn-rounded btn-success" data-toggle="modal"
                                data-target="#modaleditlocation{{$location->location->id}}">{{ trans('sentence.edit') }}</i>
                            </button>

                            @include('partials.edit-location', [
                                'url' => route('update-user-location', [$location->location, $editUser]),
                                'method' => 'PUT',
                                'title' => trans('sentence.edit'),
                                'location_id' => $location->location_id,
                                'radius' => $location->radius,
                                "description" => trans('sentence.edit_confirm') . " " . trans('offer.location') . "?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-edit'),
                                'modalKey' => "editlocation".$location->location->id
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.radius') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $location->radius }} {{ __('km') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>