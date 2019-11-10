@extends('layouts.app')

@section('title')
    {{ __('List of offers') }}
@endsection

@section('css')
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('advertisement') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @include('partials.search')
        <div class="col-12">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center">
                    {{ trans('sentence.search-by')}}
                    <span class="ml-4 badge badge-pill badge-info text-white">{{ str_replace('-', ' ', request()->segment(3)) }}</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-12 mx-auto">
            @foreach($advertisements as $advertisement)
                <!-- List group-->
                <ul class="list-group shadow">
                    <a href="{{ route('show-advertisement', $advertisement->advertisement->slug) }}" class="no-decoration"> 
                        <!-- list group item-->
                        <li class="list-group-item">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2">{{ $advertisement->advertisement->title }}</h5>
                                    <div class="font-italic text-muted mb-0 small ellipsis">{!! $advertisement->advertisement->description !!}</div>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->advertisement->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->advertisement->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2"><i class="fas fa-coins"></i> {{ $advertisement->advertisement->settlement->name }}: {{ $advertisement->advertisement->min_salary }} - {{ $advertisement->advertisement->max_salary }} {{ $advertisement->advertisement->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $advertisement->advertisement->specialization->name }}</div>
                                </div>
                                @if($advertisement->advertisement->galleries()->count())
                                    <img src="{{ $advertisement->advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->advertisement->galleries[0]->oldName}}">
                                @else
                                    <img src="{{ asset('images/noImage.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                @endif
                            </div>
                            <!-- End -->
                        </li>
                        <!-- End -->
                    </a>
                </ul>
                <!-- End -->
            @endforeach
        </div>
        <div class="col-12">
            {{ $advertisements->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection