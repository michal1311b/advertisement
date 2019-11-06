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
        <img class="w-100" src="{{ asset('images/main1.jpg') }}" alt="Main 1">
      </div>
      <div class="carousel-item">
        <img class="w-100" src="{{ asset('images/main2.jpg') }}" alt="Main 2">
      </div>
      <div class="carousel-item">
        <img class="w-100" src="{{ asset('images/main3.png') }}" alt="Main 3">
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Homepage') }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="title m-b-md">
                                        {{ __('Career in medicine') }}
                                    </div>
                                </div>
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