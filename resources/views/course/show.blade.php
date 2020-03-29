@extends('layouts.app')

@section('css')
@endsection

@section('title')
    {{ $course->title }}
@endsection

@section('description')
    {{ $course->location->city }}, {{ $course->user->profile->company_name }} {{ $course->user->profile->company_street }}, {{ $course->user->profile->company_phone1 }}: {{ trans('sentence.price') }}: {{ $course->price }} {{ $course->currency->symbol }}
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('course-article', $course) !!}
            </div>
        </div>	
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('offer.offer-show') }} <strong>{{ $course->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <strong>{{ trans('sentence.post-by') }}</strong>&nbsp;{{ $course->user->profile->company_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Logo') }}
                                        <span class="badge badge-pill"><img class="user-avatar--smaller" src="{{ $course->user->avatar }}" /></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.city') }}
                                        <span class="badge badge-pill">{{ $course->location->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.street') }}
                                        <span class="badge badge-pill">{{ $course->street }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.state') }}
                                        <span class="badge badge-pill">{{ $course->state->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('profile.specialization') }}
                                        <span class="badge badge-pill badge-info text-white">{{ $course->specialization->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.created_at') }}
                                        <span class="badge badge-pill">{{ $course->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('profile.start_date') }}
                                        <span class="badge badge-pill badge-primary">{{ $course->start_date }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('profile.end_date') }}
                                        <span class="badge badge-pill badge-primary">{{ $course->end_date }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.phone') }}
                                        <span class="badge badge-pill">{{ $course->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.price') }}
                                        <span class="badge badge-pill">{{ $course->price }} {{ $course->currency->symbol }}</span>
                                    </li>
                                    @if($course->facebook !== null)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ __('Facebook') }}
                                            <a href="{{ $course->facebook }}" title="Facebook">
                                                <span class="badge badge-pill">
                                                    <img class="user-avatar--smaller" src="{{ asset('images/facebook.png') }}" alt="Facebook"/>
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>

                                <div class="py-3">
                                    <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
                                </div>

                                <div class="py-2">
                                    <h4><strong>{{ trans('offer.description') }}</strong></h4>
                                    {!! $course->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('partials.course-register')
        </div>

        @if(count($similars) > 0)
            <div class="col-md-12 py-3">
                <h4><strong>{{ trans('sentence.similar') }}</strong></h4>
            </div>
            <div class="col-md-12">
                @foreach($similars as $similar)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-course', ['id' => $similar->id, 'slug' => $similar->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $similar->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $similar->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $similar->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $similar->price }} {{ $similar->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $similar->specialization->name }}</div>
                                </div>
                                @if($similar->avatar)
                                    <img src="{{ $similar->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $similar->title }}">
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
                    {{ $similars->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" integrity="sha256-SHMGCYmST46SoyGgo4YR/9AlK1vf3ff84Aq9yK4hdqM=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js" integrity="sha256-fNoRrwkP2GuYPbNSJmMJOCyfRB2DhPQe0rGTgzRsyso=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        {
            "id": "{{ $course->specialization->id }}",
            "street": "{{ $course->street }}",
            "name": "{{ $course->location->city }}",
            "lat": {{ $course->latitude }},
            "lng": {{ $course->longitude }},
            "price": {{ $course->price }},
            "currency": "{{ $course->currency->symbol }}",
        }
    ];
    var map = L.map( 'map', {
            center: [{{ $course->latitude }}, {{ $course->longitude }}],
            minZoom: 2,
            zoom: 12
        });

    L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a','b','c']
    }).addTo( map );

    for ( var i=0; i < markers.length; ++i ) 
    {
        let icon = L.icon({ 
            iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + markers[i].id + '.jpg',
            iconSize: [26, 26],
        });
    L.marker( 
        [markers[i].lat, markers[i].lng],
        { icon: icon })
        .bindPopup( markers[i].name + ', ' + markers[i].street + ': ' + markers[i].price + ' ' + markers[i].currency )
        .addTo( map );
    }
});
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
@endsection