@extends('layouts.app')

@section('title')
    {{ trans('offer.offer-create-foreign') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('create-offer-foreign') !!}
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
                <div class="card-header">{{ trans('offer.offer-create-foreign') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-foreign') }}" enctype="multipart/form-data">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a class="nav-link active step1" data-toggle="tab" href="#step1">{{ trans('buttons.step1') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link step2" data-toggle="tab" href="#step2">{{ trans('buttons.step2') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link step3" data-toggle="tab" href="#step3">{{ trans('buttons.step3') }}</a>
                            </li>
                        </ul>

                        <create-foreign 
                        :user="{{ $user }}"
                        :works="{{ $works }}" 
                        :specializations="{{ $specializations }}"
                        :currencies="{{ $currencies }}"
                        :settlements="{{ $settlements }}"></create-foreign>
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