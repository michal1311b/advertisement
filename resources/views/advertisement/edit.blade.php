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
                <div class="card-header">{{ trans('profile.edit-offer') }}</div>

                <div class="card-body">
                    <edit-offer 
                    :advertisement="{{ $advertisement }}"
                    :works="{{ $works }}" 
                    :states="{{ $states }}"
                    :locations="{{ $locations }}"
                    :specializations="{{ $specializations }}"
                    :currencies="{{ $currencies }}"
                    :settlements="{{ $settlements }}"></edit-offer>

                    <div class="form-group row pt-3">
                        @foreach($advertisement->galleries as $image)
                            <div class="col-12 col-md-4">
                                <a href="{{ route('delete-photo', $image->id) }}" class="btn btn-rounded btn-danger">{{ trans('buttons.btn-delete') }}</a>
                                <img src="{{ $image->path }}" alt="{{ $image->oldName }}" class="d-block w-100 py-2 gallery-item"/>
                            </div>
                        @endforeach
                    </div>
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