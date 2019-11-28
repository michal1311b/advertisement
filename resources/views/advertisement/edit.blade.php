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
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.edit-offer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-advertisement', $advertisement->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.title') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $advertisement->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.description') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $advertisement->description }}" autocomplete="description" autofocus rows="3">{{ $advertisement->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profits" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.profits') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="profits" class="form-control @error('profits') is-invalid @enderror" name="profits" value="{{ $advertisement->profits }}" autocomplete="profits" autofocus rows="3">{{ $advertisement->profits }}</textarea>
                                @error('profits')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="requirements" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.requirements') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="requirements" class="form-control @error('requirements') is-invalid @enderror" name="requirements" value="{{ $advertisement->requirements }}" autocomplete="requirements" autofocus rows="3">{{ $advertisement->requirements }}</textarea>
                                @error('requirements')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">{{ trans('sentence.settlement') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">{{ trans('sentence.state') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="specialization_id">{{ trans('sentence.specialization') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('specialization_id') is-invalid @enderror" name="specialization_id" id="specialization_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
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
                                    <a href="{{ route('delete-photo', $image->id) }}" class="btn btn-danger">{{ trans('sentence.btn-delete') }}</a>
                                    <img src="{{ $image->path }}" alt="{{ $image->oldName }}" class="d-block w-100 py-2 gallery-item"/>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries">{{ trans('sentence.upload-image') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control @error('galleries') is-invalid @enderror" name="galleries[]" multiple />
                                @error('galleries')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="location_id">{{ trans('sentence.location') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
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
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.post_code') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <input id="post_code" type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ $advertisement->postCode }}" autocomplete="postCode" autofocus>
                                @error('postCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.street') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $advertisement->street }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">{{ __('E-mail') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $advertisement->email }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.phone') }} <span class="text-danger font-weight-bolder">*</span></label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $advertisement->phone }}" autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.tags') }}</label>
                            <div class="col-12 col-md-9">
                                <input type="text" value="{{$tags}}" name="tags[]" id="tags" data-role="tagsinput" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="settlement_id">{{ trans('sentence.work-category') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('settlement_id') is-invalid @enderror" name="settlement_id" id="settlement_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
                                    @foreach($settlements as $settlement)
                                        @if($advertisement->settlement_id === $settlement->id)
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

                        <div class="form-group row">
                            <label for="min_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.min_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                            <label for="max_salary" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.max_salary') }} <span class="text-danger font-weight-bolder">*</span></label>

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
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="currency_id">{{ trans('sentence.currency') }} <span class="text-danger font-weight-bolder">*</span></label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" id="currency_id">
                                    <option selected>{{ trans('sentence.choose') }}</option>
                                    @foreach($currencies as $currency)
                                        @if($advertisement->currency_id === $currency->id)
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
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="negotiable" type="hidden" value="0">
                                    <input class="form-check-input" 
                                    type="checkbox" name="negotiable" id="negotiable" value="1"
                                    {{ ($advertisement->negotiable  == 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="negotiable">
                                     {{ trans('sentence.salary_negotiable') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    {{ trans('sentence.btn-update') }}
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