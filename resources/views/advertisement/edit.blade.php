@extends('layouts.app')

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('advertisement-edit', $advertisement) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit advertisement</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-advertisement', $advertisement->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $advertisement->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $advertisement->description }}" autocomplete="description" autofocus rows="3">{{ $advertisement->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ __('Work') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                    <option selected>{{ __('Choose...') }}</option>
                                    @foreach($works as $work)
                                        @if($advertisement->work_id === $work->id)
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">{{ __('State') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                    <option selected>{{ __('Choose...') }}</option>
                                    @foreach($states as $state)
                                        @if($advertisement->state_id === $state->id)
                                            <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                        @else
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @foreach($advertisement->galleries as $image)
                                <div class="col-12 col-md-4">
                                    <a href="/advertisement/photo/{{ $image->id }}/delete" class="btn btn-danger">{{ __('Delete') }}</a>
                                    <img src="{{ $image->path }}" alt="{{ $image->oldName }}" class="d-block w-100 py-2 gallery-item"/>
                                </div>
                            @endforeach
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ __('Location') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                    <option selected>{{ __('Choose...') }}</option>
                                    @foreach($locations as $location)
                                        @if($advertisement->location_id === $location->id)
                                            <option value="{{ $location->id }}" selected>{{ $location->city }}</option>
                                        @else
                                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('location_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Post code') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ $advertisement->postCode }}" autocomplete="postCode" autofocus>
                                @error('postCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Street') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $advertisement->street }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $advertisement->email }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $advertisement->phone }}" autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Tags') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="text" value="{{$tags}}" name="tags[]" id="tags" data-role="tagsinput" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
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