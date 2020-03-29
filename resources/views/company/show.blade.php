@extends('layouts.app')

@section('title')
    {{ trans('company.company-offers') . ' ' . $user->profile->company_name ?? '' }}
@endsection

@section('description')
{{ $user->profile->company_street ?? '' }}, {{ $user->profile->company_post_code ?? '' }} {{ $user->profile->company_city ?? '' }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('company-site', $user) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-6 pb-3">
            <div id="map1" style="height: 440px; border: 1px solid #AAA;"></div>
        </div>
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card border border-dark">
                <div class="card-header">
                    <img src="{{ $user->avatar ?? '/images/logo.png'}}" class="user-avatar user-avatar--smaller"
                    alt="{{ $user->profile->company_name ?? $user->name }}">
                    <h4>
                        {{ $user->profile->company_name ?? ''}}
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success"><i class="fa fa-circle"></i> Online</span>
                        @else
                            <span class="text-secondary"><i class="fa fa-circle"></i> Offline</span>
                        @endif
                    </h4>
                </div>
                <div class="card-body">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $user->profile->company_street ?? '' }},
                    {{ $user->profile->company_post_code ?? '' }}
                    {{ $user->profile->company_city ?? '' }}
                    <h3><i class="fas fa-globe-europe"></i> {{ trans('offer.offers') }}: {{ count($user->advertisements) }}</h3>
                </div>
                <div class="card-body">
                    @if(count($user->advertisements) > 0)
                        <ul>
                            @foreach($user->advertisements as $specialization)
                                <a href="#p{{ $specialization->id }}">
                                    <li>
                                        {{ $specialization->specialization->name }}, {{ $specialization->location->city }}, {{ $specialization->min_salary }}-{{ $specialization->max_salary }} {{ $specialization->currency->symbol }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 mx-auto">
            @if(count($user->advertisements) > 0)
                @foreach($user->advertisements as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item" id="p{{ $advertisement->id }}">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
                                    </div>
                                </div>
                                @if($advertisement->galleries()->count())
                                    <img src="{{ $advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->galleries[0]->oldName}}">
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
            @else
                <div class="col-12">
                    <a href="{{ route('create-advertisement') }}">
                        <h4>{{ trans('offer.no-offers') }}</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-6 pb-3">
            <div id="map2" style="height: 440px; border: 1px solid #AAA;"></div>
        </div>
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <img src="{{ $user->avatar ?? '/images/logo.png'}}" class="user-avatar user-avatar--smaller"
                    alt="{{ $user->profile->company_name ?? $user->name }}">
                    <h4>
                        {{ $user->profile->company_name ?? ''}}
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success"><i class="fa fa-circle"></i> Online</span>
                        @else
                            <span class="text-secondary"><i class="fa fa-circle"></i> Offline</span>
                        @endif
                    </h4>
                </div>
                <div class="card-body">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $user->profile->company_street ?? '' }},
                    {{ $user->profile->company_post_code ?? '' }}
                    {{ $user->profile->company_city ?? '' }}
                    <h3><i class="fas fa-globe-europe"></i> {{ trans('offer.foreigns-list') }}: {{ count($user->foreignOffers) }}</h3>
                </div>
                <div class="card-body">
                    @if(count($user->foreignOffers) > 0)
                        <ul>
                            @foreach($user->foreignOffers as $specialization)
                                <a href="#{{ $specialization->id }}">
                                    <li>
                                        {{ $specialization->specialization->name }}, {{ $specialization->city }}, {{ $specialization->min_salary }}-{{ $specialization->max_salary }} {{ $specialization->currency->symbol }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 mx-auto">
            @if(count($user->foreignOffers) > 0)
                @foreach($user->foreignOffers as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-foreign', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item" id="{{ $advertisement->id }}">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
                                    </div>
                                </div>
                                @if($advertisement->image_profile !== null)
                                    <img src="{{ $advertisement->image_profile }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $advertisement->title }}">
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
            @else
                <div class="col-12">
                    <a href="{{ route('create-foreign') }}">
                        <h4>{{ trans('offer.no-offers') }}</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" integrity="sha256-SHMGCYmST46SoyGgo4YR/9AlK1vf3ff84Aq9yK4hdqM=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js" integrity="sha256-fNoRrwkP2GuYPbNSJmMJOCyfRB2DhPQe0rGTgzRsyso=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    document.getElementById('map1').innerHTML = "<div id='map1' style='width: 100%; height: 100%;'></div>";
    markers1 = [
        @foreach($user->advertisements as $advertisement)
            {
                "id": "{{ $advertisement->specialization->id }}",
                "street": "{{ $advertisement->street }}",
                "name": "{{ $advertisement->location->city }}",
                "lat": {{ $advertisement->latitude }},
                "lng": {{ $advertisement->longitude }},
                "slug": "{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}",
                "min_salary": {{ $advertisement->min_salary }},
                "max_salary": {{ $advertisement->max_salary }},
                "currency": "{{ $advertisement->currency->symbol }}",
            },
        @endforeach
    ];
    var map1 = L.map( 'map1', {
            center: [52.237049, 21.017532],
            minZoom: 2,
            zoom: 6
        });

    L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a','b','c']
    }).addTo( map1 );

    for ( var i=0; i < markers1.length; ++i ) 
    {
        let icon = L.icon({ 
            iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + markers1[i].id + '.jpg',
            iconSize: [26, 26],
        });

        L.marker( 
        [markers1[i].lat, markers1[i].lng],
        { icon: icon } )
        .bindPopup( '<a href="' + markers1[i].slug + '" target="_blank">' + markers1[i].name + ', ' + markers1[i].street + ': ' + markers1[i].min_salary + '-' + markers1[i].max_salary + ' ' + markers1[i].currency + '</a>' )
        .addTo( map1 );
    }

    document.getElementById('map2').innerHTML = "<div id='map2' style='width: 100%; height: 100%;'></div>";
    markers2 = [
        @foreach($user->foreignOffers as $advertisement)
            {
                "id": "{{ $advertisement->specialization->id }}",
                "street": "{{ $advertisement->street }}",
                "name": "{{ $advertisement->city }}",
                "lat": {{ $advertisement->latitude }},
                "lng": {{ $advertisement->longitude }},
                "slug": "{{ route('show-foreign', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}",
                "min_salary": {{ $advertisement->min_salary }},
                "max_salary": {{ $advertisement->max_salary }},
                "currency": "{{ $advertisement->currency->symbol }}",
            },
        @endforeach
    ];
    var map2 = L.map( 'map2', {
            center: [54.547049, 25.197532],
            minZoom: 2,
            zoom: 3
        });

    L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a','b','c']
    }).addTo( map2 );

    for ( var i=0; i < markers2.length; ++i ) 
    {
        let icon = L.icon({ 
            iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + markers2[i].id + '.jpg',
            iconSize: [26, 26],
        });

        L.marker( 
        [markers2[i].lat, markers2[i].lng],
        { icon: icon } )
        .bindPopup( '<a href="' + markers2[i].slug + '" target="_blank">' + markers2[i].name + ', ' + markers2[i].street + ': ' + markers2[i].min_salary + '-' + markers2[i].max_salary + ' ' + markers2[i].currency + '</a>' )
        .addTo( map2 );
    }
});
</script>
@endsection