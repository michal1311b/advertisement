@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create advertisement') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-advertisement') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="title" autofocus rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ __('Work') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                    <option selected>Choose...</option>
                                    @foreach($works as $work)
                                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endforeach
                                </select>
                                @error('work_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ __('Location') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                    <option selected>Choose...</option>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">{{ __('State') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                    <option selected>Choose...</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries">{{ __('Upload files') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control @error('galleries') is-invalid @enderror" name="galleries[]" multiple />
                                @error('galleries')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Post code') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ old('postCode') }}" autocomplete="postCode" autofocus>
                                @error('postCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Street') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Tags') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="text" value="" name="tags[]" id="tags" data-role="tagsinput" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="term1" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="term1" id="term1" value="1"
                                    {{ old('term1', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="term1">
                                     {{ __('term1') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="term2" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="term2" id="term2" value="1"
                                    {{ old('term2', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="term2">
                                     {{ __('term2') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="term3" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="term3" id="term3" value="1"
                                    {{ old('term3', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="term3">
                                     {{ __('term3') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection