@extends('layouts.site')

@section('title')
    {{ __('Employmed - Find better, well-paid jobs in medicine. Closer than you think.') }}
@endsection

@section('description')
    {{ __('The first map of the labor market in the medical sector. We want to simplify the search process to minimum.') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('site.homepage') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('images/main1.jpg') }}" alt="Main 1">
        <div class="carousel-caption d-none d-md-block text-dark">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/main2.jpg') }}" alt="Main 2">
        <div class="carousel-caption d-none d-md-block text-dark">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/main3.png') }}" alt="Main 3">
        <div class="carousel-caption d-none d-md-block text-dark">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
</div>
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.homepage') }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h3>
                                            {{ trans('sentence.homepage.title') }}
                                        </h3>
                                        <h6>
                                            {{ trans('sentence.homepage.subtitle') }}
                                        </h6>
                                    </div>
                                    <div>
                                        <a href="{{ route('register') }}" class="btn btn-primary">
                                            {{ trans('sentence.register') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <img src="{{ asset('images/devices.png') }}" alt="Devices" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6 order-1 order-md-2">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h3>
                                            {{ trans('sentence.homepage.what.it') }}
                                        </h3>
                                        <h6>
                                            {{ trans('sentence.homepage.employmed') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 order-2 order-md-1">
                                <img src="{{ asset('images/doctor-main.png') }}" alt="Doctor main page" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($advertisements) > 0)
                @foreach($advertisements as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', $advertisement->slug) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                        <div class="font-italic text-muted mb-2 small ellipsis">{!! $advertisement->description !!}</div>
                                        <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->location->city }}</h6>
                                        <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                        </div>
                                        <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                    </div>
                                    @if($advertisement->galleries()->count())
                                        <img src="{{ $advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->galleries[0]->oldName}}">
                                    @else
                                        <img src="{{ $advertisement->user->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="EmployMed">
                                    @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                @endforeach
            @else
                <div class="col-12">
                    <a href="{{ route('advertisement-create') }}">
                        <h4>{{ trans('sentence.no-offers') }}</h4>
                    </a>
                </div>
            @endif
        </div>
        <div class="col-12 pt-2 text-center">
            <a href="{{ route('advertisement-list') }}" class="btn btn-info border border-warning mr-2 text-white">{{ trans('sentence.watch-all') }}</a>
        </div>
        <div class="col-12 pt-2">
            <h4>{{ trans('sentence.companies-orderBy-offers') }}</h4>
        </div>
        <div class="col-12 pt-2">
            @include('partials.company-slider')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection