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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.offer-show') }} <strong>{{ $advertisement->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <strong>{{ trans('sentence.post-by') }}</strong>&nbsp;{{ $advertisement->user->profile->company_name }}
                                    </div>
                                    <div class="input-group">
                                        @if(Auth::check() && (Auth::user()->id !== $advertisement->user->id))
                                            @if (Auth::user()->isFollowing($advertisement->user->id))
                                                <div class="btn-group btn-group-toggle">
                                                    <form action="{{ route('unfollow', ['id' => $advertisement->user->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" id="delete-follow-{{ $advertisement->user->id }}" class="btn btn-danger">
                                                            <i class="fa fa-btn fa-trash"></i>Unfollow
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="btn-group btn-group-toggle">
                                                    <form action="{{route('follow', ['id' => $advertisement->user->id])}}" method="POST">
                                                        {{ csrf_field() }}

                                                        <button type="submit" id="follow-user-{{ $advertisement->user->id }}" class="btn btn-success">
                                                            <i class="fa fa-btn fa-user"></i>Follow
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
                                    {{ trans('sentence.tags') }}
                                    @foreach($advertisement->tags as $tag)
                                        <a href="{{ route('advertisementTag', ['tagSlug' => $tag->slug]) }}">
                                            <span class="badge badge-pill badge-info text-white">
                                                {{ $tag->name }}
                                            </span>
                                        </a>
                                    @endforeach
                                @else
                                    <span class="font-weight-bold">{{ trans('sentence.no-tags') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Logo') }}
                                        <span class="badge badge-pill"><img class="user-avatar--smaller" src="{{ $advertisement->user->avatar }}" /></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.city') }}
                                        <span class="badge badge-pill">{{ $advertisement->location->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.street') }}
                                        <span class="badge badge-pill">{{ $advertisement->street }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.state') }}
                                        <span class="badge badge-pill">{{ $advertisement->state->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.specialization') }}
                                        <span class="badge badge-pill badge-info text-white">{{ $advertisement->specialization->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.created_at') }}
                                        <span class="badge badge-pill">{{ $advertisement->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.expired_at') }}
                                        <span class="badge badge-pill badge-primary">{{ $advertisement->expired_at }}</span>
                                    </li>

                                    @if($advertisement->expired_at < \Carbon\Carbon::now())
                                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-danger text-uppercase">
                                            {{ trans('sentence.offer-archive') }}
                                            <span class="badge badge-pill"><img class="user-avatar--smaller" src="{{ asset('images/archived.png') }}" /></span>
                                        </li>
                                    @endif
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.phone') }}
                                        <span class="badge badge-pill">{{ $advertisement->phone }}</span>
                                    </li> --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.settlement') }}
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.salary') }}
                                        <span class="badge badge-pill">{{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.salary_negotiable') }}
                                        @if($advertisement->negotiable === 1)
                                            <i class="fas fa-clipboard-check"></i>
                                        @else
                                            <i class="fas fa-times-circle"></i>
                                        @endif
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.work-category') }}
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
                                            <input type="number" min="0" class="form-control" id="fuelCost" placeholder="{{ trans('sentence.fuel-cost') }}">
                                        </div>
                                        <div class="pb-2">
                                            <input type="number" min="0" class="form-control" id="avgFuel" placeholder="{{ trans('sentence.fuel-avg') }}">
                                        </div>
                                        <div class="pb-2">
                                            <input type="number" min="0" class="form-control" id="daysInWeek" placeholder="{{ trans('sentence.work-arrive') }}"> 
                                        </div>
                                        <span class="btn btn-success" onclick="calculate()">{{ trans('sentence.btn-count') }}</span>
                                    </div>
                                    <p>{{ trans('sentence.arrive-cost') }} <span id="cost" class="text-info font-weight-bold"></span></p>
                                </div>

                                <div class="py-2 location-info alert alert-info font-weight-bolder">
                                    {{ trans('sentence.location-allow-info') }}
                                </div>

                                <div class="py-2" id="description">
                                    <h4><strong>{{ trans('sentence.description') }}</strong></h4>
                                    {!! $advertisement->description !!}
                                </div>

                                @if($advertisement->requirements !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ trans('sentence.requirements') }}</strong></h4>
                                        {!! $advertisement->requirements !!}
                                    </div>
                                @endif

                                @if($advertisement->profits !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ trans('sentence.profits') }}</strong></h4>
                                        {!! $advertisement->profits !!}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-md-4">
                                <div id="advertisementCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($advertisement->galleries as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="10000">
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
                    <ul class="list-group shadow">
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
                                    <div class="badge badge-secondary">{{ $similar->specialization->name }}</div>
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
                    .bindPopup( "{{trans('sentence.you-are-here')}}" )
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