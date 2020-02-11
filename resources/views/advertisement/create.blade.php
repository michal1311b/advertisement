@extends('layouts.app')

@section('title')
    {{ trans('sentence.offer-create-poland') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('create-offer') !!}
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
                <div class="card-header">{{ trans('sentence.offer-create-poland') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-advertisement') }}" enctype="multipart/form-data">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a class="nav-link active step1" data-toggle="tab" href="#step1">{{ trans('sentence.step1') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link step2" data-toggle="tab" href="#step2">{{ trans('sentence.step2') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link step3" data-toggle="tab" href="#step3">{{ trans('sentence.step3') }}</a>
                            </li>
                        </ul>

                        <create-offer 
                        :user="{{ $user }}"
                        :works="{{ $works }}" 
                        :states="{{ $states }}"
                        :locations="{{ $locations }}"
                        :specializations="{{ $specializations }}"
                        :currencies="{{ $currencies }}"
                        :settlements="{{ $settlements }}"></create-offer>
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