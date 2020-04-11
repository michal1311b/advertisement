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
    {{ $advertisement->city }}, {{ $advertisement->user->profile->company_name }} {{ $advertisement->user->profile->company_street }}, {{ $advertisement->user->profile->phone }}: {{ __('salary') }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }}
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('foreign-article', $advertisement) !!}
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
                                                            <i class="fa fa-btn fa-trash"></i>Unfollow
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="btn-group btn-group-toggle">
                                                    <form action="{{route('follow', ['id' => $advertisement->user->id])}}" method="POST">
                                                        {{ csrf_field() }}

                                                        <button type="submit" id="follow-user-{{ $advertisement->user->id }}" class="btn btn-rounded btn-success">
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
                                            <a href="{{ route('foreign.like', $advertisement->id) }}" class="no-decoration text-white">
                                                <span class="mx-2">{{ trans('sentence.like') }}</span>
                                                <img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Like">
                                            </a>
                                        @else
                                            <a href="{{ route('foreign.like', $advertisement->id) }}" class="no-decoration text-white font-weight-bold">
                                                <span class="mx-2">{{ trans('sentence.dislike') }}</span>
                                                <img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Dislike">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Logo') }}
                                        <a href="{{ route('company-show', $advertisement->user) }}" title="{{ $advertisement->user->profile->company_name }}" >
                                            <span class="badge badge-pill">
                                                <img class="user-avatar--smaller" src="{{ $advertisement->user->avatar }}" />
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.city') }}
                                        <span class="badge badge-pill">{{ $advertisement->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.street') }}
                                        <span class="badge badge-pill">{{ $advertisement->street }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('profile.specialization') }}
                                        <span class="ml-2 btn btn-sm offer-item border{{ $advertisement->specialization_id }} text-white">
                                            {{ $advertisement->specialization->name }}
                                            <img src="{{ asset('images/icons/' . $advertisement->specialization->id . '.jpg') }}" 
                                            class="rounded-circle" alt="{{ $advertisement->specialization->name }}">
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.created_at') }}
                                        <span class="badge badge-pill">{{ $advertisement->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.expired_at') }}
                                        <span class="badge badge-pill badge-primary">{{ $advertisement->expired_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.visits') }}
                                        <span class="badge badge-pill"><i class="fas fa-eye"></i> {{ $advertisement->foreign_visits_count }}</span>
                                    </li>
                                    @if($advertisement->expired_at < \Carbon\Carbon::now())
                                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-danger text-uppercase">
                                            {{ trans('offer.offer-archive') }}
                                            <span class="badge badge-pill"><img class="user-avatar--smaller" src="{{ asset('images/archived.png') }}" /></span>
                                        </li>
                                    @endif
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.phone') }}
                                        <span class="badge badge-pill">{{ $advertisement->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.settlement') }}
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.salary') }}
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
                                        {{ trans('offer.salary_negotiable') }}
                                        @if($advertisement->negotiable === 1)
                                            <i class="fas fa-clipboard-check"></i>
                                        @else
                                            <i class="fas fa-times-circle"></i>
                                        @endif
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('offer.work-category') }}
                                        <span class="badge badge-pill">{{ $advertisement->settlement->name }}</span>
                                    </li>
                                </ul>

                                <div class="py-3">
                                    <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
                                    <p id="distance-info" class="pt-3 text-danger"></p>
                                </div>

                                <div class="py-2" id="description">
                                    <h4><strong>{{ trans('offer.description') }}</strong></h4>
                                    {!! $advertisement->description !!}
                                </div>

                                @if($advertisement->requirements !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ trans('offer.requirements') }}</strong></h4>
                                        {!! $advertisement->requirements !!}
                                    </div>
                                @endif

                                @if($advertisement->profits !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ trans('offer.profits') }}</strong></h4>
                                        {!! $advertisement->profits !!}
                                    </div>
                                @endif
                            </div>
                            @if($poster)
                                <div class="col-12 col-md-4 img-hover-zoom--quick-zoom" data-interval="10000">
                                    <img src="{{ $poster->path }}" class="d-block" alt="poster">
                                </div>
                            @endif
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
                @include('partials.contact', ['offerType' => 'foreign'])
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
                        <a href="{{ route('show-foreign', ['id' => $similar->id, 'slug' => $similar->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $similar->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $similar->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $similar->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $similar->settlement->name }}: {{ $similar->min_salary }} - {{ $similar->max_salary }} {{ $similar->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-pill offer-item border{{ $similar->specialization_id }} text-white">{{ $similar->specialization->name }}</div>
                                </div>
                                @if($similar->image_profile !== null)
                                    <img src="{{ $similar->image_profile }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $similar->title }}">
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
                @include('partials.opinion-form', ['offerType' => 'foreign'])
            @else
                <div class="alert alert-warning">
                    <a href="{{ route('login')}}" class="text-success font-weight-bold">
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
<script>
$(document).ready(function() {
    document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        {
            "id": "{{ $advertisement->specialization->id }}",
            "street": "{{ $advertisement->street }}",
            "name": "{{ $advertisement->city }}",
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
        { icon: icon })
        .bindPopup( markers[i].name + ', ' + markers[i].street + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency )
        .addTo( map );

        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            
            var distance = this.distance(
                {{ $advertisement->latitude }}, 
                {{ $advertisement->longitude }}, 
                lat, long, 'K');

                var x = document.getElementById("distance-info");
                if (navigator.geolocation) {
                    x.innerHTML = "{{ trans('offer.distanceBetween') }}" + '' + '<b>'+Math.round(distance, 2) + ' km</b>';
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
                
                
        });
    }
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
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
@endsection