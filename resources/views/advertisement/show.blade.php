@extends('layouts.app')

@section('css')
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('title')
    {{ $advertisement->title }}
@endsection

@section('description')
    {{ $advertisement->location->city }}, {{ $advertisement->user->profile->company_name }} {{ $advertisement->user->profile->company_street }}, {{ $advertisement->user->profile->phone }}: {{ __('salary') }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }}
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('advertisement-article', $advertisement) !!}
            </div>
        </div>	
    </div>
@endsection

@section('content')
<div class="container px-0">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card offer-item color{{ $advertisement->specialization_id }}">
                <div class="card-header">{{ trans('offer.offer-show') }} <strong>{{ $advertisement->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <strong>{{ trans('sentence.post-by') }}</strong>&nbsp;
                                        <a href="{{ route('company-show', $advertisement->user) }}" title="{{ $advertisement->user->profile->company_name }}">
                                            {{ $advertisement->user->profile->company_name }}
                                            @if($advertisement->user->isOnline())
                                                <span class="text-success"><i class="fa fa-circle"></i> {{ trans('offer.employer-online') }}</span>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="input-group">
                                        @if(Auth::check() && (Auth::user()->id !== $advertisement->user->id))
                                            @if (Auth::user()->isFollowing($advertisement->user->id))
                                                <div class="btn-group btn-group-toggle">
                                                    <form action="{{ route('unfollow', ['id' => $advertisement->user->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" id="delete-follow-{{ $advertisement->user->id }}" class="btn btn-rounded btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i> {{ trans('buttons.unfollow') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="btn-group btn-group-toggle">
                                                    <form action="{{route('follow', ['id' => $advertisement->user->id])}}" method="POST">
                                                        {{ csrf_field() }}

                                                        <button type="submit" id="follow-user-{{ $advertisement->user->id }}" class="btn btn-rounded btn-success">
                                                            <i class="fa fa-btn fa-user"></i> {{ trans('buttons.follow') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user() && Auth::user()->hasRole('doctor'))
                                <div class="col-md-12 py-2">
                                    <div class="btn-group btn-group-toggle px-2 py-2 text-white @if ($advertisement->isLiked) bg-success @else bg-info @endif">
                                        @if ($advertisement->isLiked)
                                            <a href="{{ route('offer.like', $advertisement->id) }}" class="no-decoration text-white">
                                                <span class="mx-2">{{ trans('sentence.like') }}</span>
                                                <img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Like">
                                            </a>
                                        @else
                                            <a href="{{ route('offer.like', $advertisement->id) }}" class="no-decoration text-white font-weight-bold">
                                                <span class="mx-2">{{ trans('sentence.dislike') }}</span>
                                                <img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Dislike">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 pb-2">
                                @if($advertisement->tags->count() > 0 && $advertisement->tags[0]->name !== '')
                                    
                                    <ul class="tags">
                                        {{ trans('offer.tags') }}
                                        @foreach($advertisement->tags as $tag)
                                            <a class="tag" href="{{ route('advertisementTag', ['tagSlug' => $tag->slug]) }}">
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="font-weight-bold">{{ trans('offer.no-tags') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-box"></i>&nbsp;{{ __('Logo') }}
                                        </span>
                                        <a href="{{ route('company-show', $advertisement->user) }}" title="{{ $advertisement->user->profile->company_name }}" >
                                            <span class="badge badge-pill">
                                                <img class="user-avatar--smaller" alt="{{ $advertisement->user->profile->company_name }} logo" src="{{ $advertisement->user->avatar }}" />
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-city"></i>&nbsp;{{ trans('offer.city') }}
                                        </span>
                                        <span class="badge badge-pill">{{ $advertisement->location->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-road"></i>&nbsp;{{ trans('offer.street') }}
                                        </span>
                                        <span class="badge badge-pill">{{ $advertisement->street }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-flag"></i>&nbsp;{{ trans('offer.state') }}
                                        </span>
                                        <a href="{{ route('offers-by-state', ['state' => $advertisement->state, 'slug' => $advertisement->state->slug]) }}" title="{{ $advertisement->state->name }}">
                                            <span class="badge badge-pill">
                                                {{ $advertisement->state->name }}
                                                <img class="state-icon" src="{{ asset('images/icons/states/' . $advertisement->state->id . '.png') }}" alt="{{ trans('offer.state') }} {{ $advertisement->state->name }}">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-clinic-medical"></i>&nbsp;{{ trans('profile.specialization') }}
                                        </span>
                                        <a href="{{ route('offers-by-specialization', ['specialization' => $advertisement->specialization, 'slug' => $advertisement->specialization->slug]) }}">
                                            <span class="ml-2 btn btn-sm offer-item border{{ $advertisement->specialization_id }} text-white">
                                                {{ $advertisement->specialization->name }}
                                                <img src="{{ asset('images/icons/' . $advertisement->specialization->id . '.jpg') }}" 
                                                class="rounded-circle" alt="{{ $advertisement->specialization->name }}">
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="far fa-calendar-plus"></i>&nbsp;{{ trans('offer.created_at') }}
                                        </span>
                                        <span class="badge badge-pill">{{ $advertisement->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-calendar-day"></i>&nbsp;{{ trans('offer.expired_at') }}
                                        </span>
                                        <span class="badge badge-pill badge-primary">{{ $advertisement->expired_at }}</span>
                                    </li>

                                    @if($advertisement->expired_at < \Carbon\Carbon::now())
                                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-danger text-uppercase">
                                            <span>
                                                <i class="fas fa-calendar-day"></i> {{ trans('offer.offer-archive') }}
                                            </span>
                                            <span class="badge badge-pill">
                                                <img class="user-avatar--smaller" src="{{ asset('images/archived.png') }}" />
                                            </span>
                                        </li>
                                    @endif
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-eye"></i>&nbsp;{{ trans('offer.visits') }}
                                        </span>
                                        <span class="badge badge-pill"><i class="fas fa-eye"></i> {{ $advertisement->visits_count }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-file-contract"></i>&nbsp;{{ trans('offer.settlement') }}
                                        </span>
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-coins"></i>&nbsp;{{ trans('offer.salary') }}
                                        </span>
                                        <span class="badge badge-pill">
                                            <select class="custom-select">
                                                <option selected>
                                                    {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}
                                                </option>
                                                @foreach($currencyExchanges->rates as $key => $value)
                                                    <option>
                                                        {{ round($advertisement->min_salary * $value, 2) }} - {{ round($advertisement->max_salary * $value, 2) }} {{ $key }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-file-signature"></i>&nbsp;{{ trans('offer.salary_negotiable') }}
                                        </span>
                                        @if($advertisement->negotiable === 1)
                                            <i class="fas fa-clipboard-check"></i>
                                        @else
                                            <i class="fas fa-times-circle"></i>
                                        @endif
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="fas fa-handshake"></i>&nbsp;{{ trans('offer.work-category') }}
                                        </span>
                                        <span class="badge badge-pill">{{ $advertisement->settlement->name }}</span>
                                    </li>
                                </ul>

                                <div class="py-3">
                                    <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
                                    <p id="distance-info" class="pt-3 text-danger"></p>
                                </div>

                                <div class="py-2 calculator">
                                    <div class="form-group">
                                        <div class="pb-2">
                                            <input type="number" min="0" class="form-control" id="fuelCost" placeholder="{{ trans('offer.fuel-cost') }}">
                                        </div>
                                        <div class="pb-2">
                                            <input type="number" min="0" class="form-control" id="avgFuel" placeholder="{{ trans('offer.fuel-avg') }}">
                                        </div>
                                        <div class="pb-2">
                                            <input type="number" min="0" class="form-control" id="daysInWeek" placeholder="{{ trans('offer.work-arrive') }}"> 
                                        </div>
                                        <span class="btn btn-rounded btn-success" onclick="calculate()">{{ trans('buttons.btn-count') }}</span>
                                    </div>
                                    <p>{{ trans('offer.arrive-cost') }} <span id="cost" class="text-info font-weight-bold"></span></p>
                                </div>

                                <div class="py-2 location-info alert alert-info font-weight-bolder">
                                    {{ trans('offer.location-allow-info') }}
                                </div>

                                <div class="py-2" id="description">
                                    <h4><strong><i class="fas fa-audio-description"></i>&nbsp;{{ trans('offer.description') }}</strong></h4>
                                    {!! $advertisement->description !!}
                                </div>

                                @if($advertisement->requirements !== null)
                                    <div class="py-2">
                                        <h4><strong><i class="fas fa-align-justify"></i>&nbsp;{{ trans('offer.requirements') }}</strong></h4>
                                        {!! $advertisement->requirements !!}
                                    </div>
                                @endif

                                @if($advertisement->profits !== null)
                                    <div class="py-2">
                                        <h4><strong><i class="fab fa-product-hunt"></i>&nbsp;{{ trans('offer.profits') }}</strong></h4>
                                        {!! $advertisement->profits !!}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div id="advertisementCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @if($poster)
                                            <div class="carousel-item col-12 col-md-4 active img-hover-zoom--quick-zoom" data-interval="10000">
                                                <img src="{{ $poster->path }}" class="d-block" alt="poster">
                                            </div>
                                        @endif
                                        @foreach($advertisement->galleries as $image)
                                            <div class="carousel-item col-12 col-md-4" data-interval="10000">
                                                <img src="{{ $image->path }}" class="d-block" width="320" alt="{{ $image->oldName }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#advertisementCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#advertisementCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('company-show', $advertisement->user) }}" title="{{ $advertisement->user->profile->company_name }}"  class="no-decoration font-weight-bold text-info">
                                    {{ trans('company.visit-company') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @if(Auth::user())
                @include('partials.contact', ['offerType' => 'offer'])
            @else
                <div class="alert alert-danger">
                    <a href="{{ route('login')}}" class="text-success font-weight-bold">{{ trans('sentence.signin-to-apply') }}</a>
                </div>
            @endif
        </div>

        @if(count($similars) > 0)
            <div class="col-md-12 py-3">
                <h4><strong>{{ trans('sentence.similar') }}</strong></h4>
            </div>
            <div class="col-md-12">
                @foreach($similars as $similar)
                    <!-- List group-->
                    <ul class="list-group shadow offer-item color{{ $similar->specialization_id }}">
                        <a href="{{ route('show-advertisement', ['id' => $similar->id, 'slug' => $similar->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $similar->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $similar->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $similar->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $similar->settlement->name }}: {{ $similar->min_salary }} - {{ $similar->max_salary }} {{ $similar->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-pill offer-item border{{ $similar->specialization_id }} text-white">
                                        {{ $similar->specialization->name }}
                                        <img src="{{ asset('images/icons/' . $similar->specialization->id . '.jpg') }}" 
                                        class="rounded-circle" alt="{{ $similar->specialization->name }}">
                                    </div>
                                </div>
                                @if($similar->galleries()->count())
                                    <img src="{{ $similar->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$similar->galleries[0]->oldName}}">
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

        <div class="col-md-12 py-3">
            @if(
                (Auth::user() && Auth::user()->hasRole('doctor'))
                || (Auth::user() && Auth::user()->hasRole('admin'))
            )
                @include('partials.opinion-form', ['offerType' => 'offer'])
            @else
                <div class="alert alert-warning">
                    <a href="{{ route('login')}}" class="text-dark font-weight-bold">
                        {{ trans('sentence.signin-to-comment') }} {{ trans('sentence.comment-count') }}: ( {{ count($opinions) }} )
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" integrity="sha256-cu3EeyAbdh7FZ58X4+oQz2g30Tw/U+3Utqmr1ETODqQ=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js" integrity="sha256-OqfsQXAGfyz0njzJEepuBcQwxXRnv2I3RW70XkpsIbk=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    let totalDistance;
    $( ".calculator" ).hide();
    $( ".location-info" ).show();
    document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        {
            "id": "{{ $advertisement->specialization->id }}",
            "street": "{{ $advertisement->street }}",
            "name": "{{ $advertisement->location->city }}",
            "lat": {{ $advertisement->latitude }},
            "lng": {{ $advertisement->longitude }},
            "min_salary": {{ $advertisement->min_salary }},
            "max_salary": {{ $advertisement->max_salary }},
            "currency": "{{ $advertisement->currency->symbol }}",
        }
    ];
    var map = L.map( 'map', {
        center: [{{ $advertisement->latitude }}, {{ $advertisement->longitude }}],
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
            { 
                icon: icon
             })
            .bindPopup( markers[i].name + ', ' + markers[i].street + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency )
            .addTo( map );

        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            
            var distance = this.distance(
                {{ $advertisement->latitude }}, 
                {{ $advertisement->longitude }}, 
                lat, long, 'K');

            this.totalDistance = distance;

            var x = document.getElementById("distance-info");
            
            if (navigator.geolocation) {
                $( ".calculator" ).show();
                $( ".location-info" ).hide();

                let icon = L.icon({ 
                    iconUrl: '{{ URL::asset('/images/icons/') }}' + '/human-marker.png',
                    iconSize: [28, 42],
                });
                
                L.marker( 
                    [lat, long],
                    { 
                        icon: icon,
                        bounceOnAdd: true,
                        bounceOnAddOptions: {duration: 3000, height: 50, loop: 2},
                        bounceOnAddCallback: function() {console.log("done");}
                 })
                    .bindPopup( "{{trans('offer.you-are-here')}}" )
                    .addTo( map );

                    L.Routing.control({
                        waypoints: [
                            L.latLng(lat, long),
                            L.latLng({{ $advertisement->latitude }}, {{ $advertisement->longitude }})
                        ],
                        router: L.Routing.mapbox('pk.eyJ1IjoibWljaGFsMTMxMWIiLCJhIjoiY2s3OWIxZ2Y3MG5nMzNmbnllMGtkcm1yYiJ9.SWokiXPeuezvJZpP-6Y-3g'),
                        routeWhileDragging: true,
                        language: "{{ session()->get('locale') }}" === "" ? "en" : "{{ session()->get('locale') }}"
                    }).addTo(map);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        });
    }

    (function () {
        var session_key = window.localStorage.getItem('session_key')
        if (!session_key) {
          session_key = Math.floor(Date.now() / 1000)
          window.localStorage.setItem('session_key', session_key)
        }
      
        var payload = {
          location_id:  {{ $advertisement->location_id }},
          state_id:  {{ $advertisement->state_id }},
          specialization_id:  {{ $advertisement->specialization_id }},
          email: LoggedUser ? LoggedUser.email : null,
          session_key: session_key
        }
      
        $.post(window.location.protocol + '//' + window.location.host + "/api/visit-tracking", payload);
    })()
});

function distance(lat1, lon1, lat2, lon2, unit) {
	if ((lat1 == lat2) && (lon1 == lon2)) {
		return 0;
	}
	else {
		var radlat1 = Math.PI * lat1/180;
		var radlat2 = Math.PI * lat2/180;
		var theta = lon1-lon2;
		var radtheta = Math.PI * theta/180;
		var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
		if (dist > 1) {
			dist = 1;
		}
		dist = Math.acos(dist);
		dist = dist * 180/Math.PI;
		dist = dist * 60 * 1.1515;
		if (unit=="K") { dist = dist * 1.609344 }
		if (unit=="N") { dist = dist * 0.8684 }
        
		return dist;
	}
}

function calculate()
{
    var total;
    var daysInWeek = document.getElementById("daysInWeek").value;
    var avgFuel = document.getElementById("avgFuel").value;
    var fuelCost = document.getElementById("fuelCost").value;

    total = (Math.round(this.totalDistance, 2) * 2 * avgFuel * daysInWeek * fuelCost) / 100;

    total = Math.round(total, 2);
    
    var cost = document.getElementById("cost");
    cost.innerHTML = total;
}
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
@endsection