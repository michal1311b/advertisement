@extends('layouts.site')

@section('title')
{{ trans('sentence.opinion-thanks') }}
@endsection

@section('description')
{{ trans('sentence.opinion-thanks-description') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('opinion-summary') !!}
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
                        {{ trans('sentence.opinion-thanks') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-12">
                                {{ trans('sentence.opinion-thanks-description') }}
                            </div>
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