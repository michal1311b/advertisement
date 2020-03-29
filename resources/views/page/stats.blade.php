@extends('layouts.site')

@section('title')
    {{ trans('offer.average-rate-in-employmed') }}
@endsection

@section('description')
    {{ trans('offer.average-rate-in-employmed') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('average-salary') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('offer.average-rate-in-employmed') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-12">
                                <select id="selectBox" class="form-control">

                                    @foreach($specializations as $specialization)
                                        <option value="section{{ $specialization->id }}">
                                            <a href="{{ $specialization->id }}">
                                                <img src="{{ asset('images/icons/'.$specialization->id.'.jpg') }}" class="rounded-circle"/>
                                                <strong>{{ $specialization->name }}</strong>
                                            </a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($avgs as $avg)
                                <div class="col-12 py-1" id="section{{ $avg->specialization->id }}">
                                    <img src="{{ asset('images/icons/'.$avg->specialization->id.'.jpg') }}" class="rounded-circle"/>
                                    <strong>{{ $avg->specialization->name }}</strong> <i>{{ $avg->state->name }} {{ $avg->work->name }}:</i> <strong>{{ round($avg->avg_min) }} - {{ round($avg->avg_max) }} {{ $avg->currency->symbol }}</strong>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection