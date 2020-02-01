@extends('layouts.app')

@section('title')
    {{ trans('sentence.company-list') }}
@endsection

@section('description')
    {{ trans('sentence.company-list') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('company-list') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            @if(count($companies) > 0)
                <div>
                    {{ $companies->links() }}
                </div>
                @foreach($companies as $company)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('company-show', $company) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold my-2"><i class="fas fa-building"></i> {{ $company->profile->company_name }}</h5>
                                        <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $company->profile->company_city }}, {{ $company->profile->company_street }} {{ $company->profile->post_code }}</h6>
                                        <h3><i class="fas fa-globe-europe"></i> {{ trans('sentence.offers') }}: {{ $company->advertisements_count }}</h3>
                                    </div>
                                    @if($company->avatar)
                                        <img src="{{ $company->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $company->profile->company_name }}">
                                    @else
                                        <img src="{{ asset('images/logo.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                    @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                @endforeach
                <div class="pt-3">
                    {{ $companies->links() }}
                </div>
            @else
                <div class="col-12">
                    <h4>{{ trans('sentence.no-companies') }}</h4>
                </div>
            @endif
        </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection