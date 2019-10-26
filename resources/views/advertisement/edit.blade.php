@extends('layouts.app')

@section('title')
    {{ $advertisement->title }}
@endsection

@section('description')
    {!! $advertisement->user->name !!}
@endsection

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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id">{{ __('Specialization') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_id">
                                    <option selected>{{ __('Choose...') }}</option>
                                    @foreach($specializations as $specialization)
                                        @if($advertisement->specialization_id === $specialization->id)
                                            <option value="{{ $specialization->id }}" selected>{{ $specialization->name }}</option>
                                        @else
                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('specialization_id')
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
                                <input id="post_code" type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ $advertisement->postCode }}" autocomplete="postCode" autofocus>
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

                        <div class="form-group row">
                            <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Min salary per hour') }}</label>

                            <div class="col-12 col-md-9">
                                <input min="0"
                                 id="min_salary" type="number" 
                                 class="form-control @error('min_salary') is-invalid @enderror" name="min_salary" value="{{ $advertisement->min_salary }}" autocomplete="min_salary" autofocus>
                                @error('min_salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ __('Max salary per hour') }}</label>

                            <div class="col-12 col-md-9">
                                <input min="0"
                                 id="max_salary" type="number" 
                                 class="form-control @error('max_salary') is-invalid @enderror" name="max_salary" value="{{ $advertisement->max_salary }}" autocomplete="max_salary" autofocus>
                                @error('max_salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="negotiable" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="negotiable" id="negotiable" value="1"
                                    {{ ($advertisement->negotiable  == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="negotiable">
                                     {{ __('Salary negotiable?') }}
                                    </label>
                                </div>
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