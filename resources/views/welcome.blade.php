@extends('layouts.site')

@section('title')
    {{ trans('sentence.homepage.site.title') }}
@endsection

@section('description')
    {{ trans('sentence.homepage.site.description') }}
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
        <div class="carousel-caption d-none d-md-block text-dark font-weight-bolder">
            <h6>{{ trans('sentence.homepage.title') }}</h6>
            <span>{{ trans('sentence.homepage.slide1') }}</span>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/main2.jpg') }}" alt="Main 2">
        <div class="carousel-caption d-none d-md-block text-white">
            <h6>{{ trans('sentence.homepage.title') }}</h6>
            <span>{{ trans('sentence.homepage.slide2') }}</span>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/main3.jpg') }}" alt="Main 3">
        <div class="carousel-caption d-none d-md-block">
            <h6>{{ trans('sentence.homepage.title') }}</h6>
            <span>{{ trans('sentence.homepage.slide3') }}</span>
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
                            <div class="col-12">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#gear" class="btn btn-secondary kreep">
                                        <i class="fas fa-cogs"></i>
                                    </a>
                                    <a href="#hourglass" class="btn btn-secondary wiggle">
                                        <i class="fas fa-hourglass-half"></i>
                                    </a>
                                    <a href="#money" class="btn btn-secondary kreep">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        <a href="{{ route('register.step') }}" class="btn btn-primary">
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
                                <img src="{{ asset('images/doctor-main.png') }}" alt="Doctor main page" class="w-100 doctor-main">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="gear">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h3>
                                            <i class="fas fa-cogs"></i>
                                            {{ trans('sentence.homepage.how.it.works') }}
                                        </h3>
                                        <h6>
                                            {{ trans('sentence.homepage.how.it.works.explain') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="hourglass">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h3>
                                            <i class="fas fa-hourglass-half"></i>
                                            {{ trans('sentence.homepage.for.doctor.stomatologist') }}
                                        </h3>
                                        <h6>
                                            {!! trans('sentence.homepage.for.doctor.stomatologist.explain') !!}
                                        </h6>
                                    </div>
                                    <div class="body embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/j5M3c87JJfE?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="money">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="title m-b-md">
                                        <h3>
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            {{ trans('sentence.homepage.for.employer') }}
                                        </h3>
                                        <h6>
                                            {!! trans('sentence.homepage.for.employer.explain') !!}
                                        </h6>
                                    </div>
                                    <div class="body embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/JpZeIW_z9Qk?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="newestOffers">
            <h4 class="py-2">
                {{ trans('sentence.interested-offers') }}
            </h4>
            
            <ul class="list-group shadow" id="newestList">
            </ul>
        </div>
        <div class="col-12">
            <h4 class="py-2">
                {{ trans('sentence.newest-offers') }}
            </h4>
            @if(count($advertisements) > 0)
                <ul class="list-group shadow">
                    @foreach($advertisements as $advertisement)
                        <!-- List group-->
                            <a href="{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}" class="no-decoration" title="{{ $advertisement->title }}"> 
                                <!-- list group item-->
                                <li class="list-group-item">
                                    <!-- Custom content-->
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                            <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->location->city }}</h6>
                                            <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }}&nbsp;-&nbsp;{{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                            </div>
                                            <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                            <div>
                                                <i class="fas fa-calendar-day"></i> {{ trans('sentence.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
                                            </div>
                                        </div>
                                        @if($advertisement->galleries()->count())
                                            <img src="{{ $advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $advertisement->user->profile->company_name }}">
                                        @else
                                            <img src="{{ $advertisement->user->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="EmployMed">
                                        @endif
                                    </div>
                                    <!-- End -->
                                </li>
                                <!-- End -->
                            </a>
                        <!-- End -->
                    @endforeach
                </ul>
            @else
                <div class="col-12 py-3">
                    <a href="{{ route('create-advertisement') }}">
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
<script src="{{ asset('js/usedInViews/welcome.js') }}"></script>
@endsection