@extends('layouts.site')

@section('title')
    {{ trans('sentence.courses') }}
@endsection

@section('description')
    {{ trans('homepage.employmed') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('courses') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 pb-3">
            <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
        </div>
        <div class="col-lg-12 mx-auto">
            @if(count($courses) > 0)
                <div class="pt-3">
                    {{ $courses->links() }}
                </div>
                @foreach($courses as $course)
                    <!-- List group-->
                    <ul class="list-group shadow offer-item color{{ $course->specialization_id }}">
                        <a href="{{ route('show-course', ['id' => $course->id, 'slug' => $course->slug]) }}" class="no-decoration" title="{{ $course->title }}"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $course->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $course->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $course->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $course->price }} {{ $course->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-pill offer-item border{{ $course->specialization_id }} text-white">{{ $course->specialization->name }}</div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('profile.start_date') }} <span class="badge badge-primary">{{ $course->start_date }}</span> - {{ trans('profile.end_date') }} <span class="badge badge-primary">{{ $course->end_date }}</span>
                                    </div>
                                </div>
                                @if($course->avatar !== null)
                                    <img src="{{ $course->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $course->title }}">
                                @else
                                <img src="{{ asset('images/course-default.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                    @if(Auth::user() && Auth::user()->hasRole('admin'))
                        <div class="col-md-12">
                            <div class="btn-group btn-group-toggle py-2">
                                <a href="{{ route('edit-course', $course->id) }}" class="btn btn-rounded btn-info border border-warning mr-2 text-white">{{ trans('sentence.edit') }}</a>
                                
                                <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$course->id}}">{{ trans('buttons.btn-delete') }}</i>
                                </button>
                                @include('partials.confirmation', [
                                    'url' => route('delete-course', $course->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń kurs",
                                    "description" => "Czy na pewno chcesz usunąć kurs?",
                                    "description_parameters" => [],
                                    'button' => trans('buttons.btn-delete'),
                                    'modalKey' => "remove".$course->id
                                ])
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="pt-3">
                    {{ $courses->links() }}
                </div>
            @else
                <div class="col-12">
                    <a href="{{ route('create-course') }}">
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
// document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        @foreach($courses as $course)
            {
                "id": "{{ $course->specialization->id }}",
                "name": "{{ $course->location->city }}",
                "street": "{{ $course->street }}",
                "lat": {{ $course->latitude }},
                "lng": {{ $course->longitude }},
                "slug": "{{ route('show-advertisement', ['id' => $course->id, 'slug' => $course->slug]) }}",
                "price": {{ $course->price }},
                "currency": "{{ $course->currency->symbol }}",
            },
    @endforeach
    ];
    var map = L.map( 'map', {
        center: [52.237049, 21.017532],
        minZoom: 2,
        zoom: 6
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
        // specify popup options 
        var customOptions =
        {
            'maxWidth': '500',
            'className' : 'custom'
        }
        var point = L.marker( 
        [markers[i].lat, markers[i].lng],
        { 
            icon: icon,
            title: markers[i].name + ', ' + markers[i].street + ': ' + markers[i].price + ' ' + markers[i].currency
            })
        .addTo( map )
        .bindPopup( '<a href="' + markers[i].slug + '" target="_blank">' + markers[i].name + ', ' + markers[i].street + ': ' + markers[i].price + ' ' + markers[i].currency + '</a>', customOptions );
    }
});
</script>
@endsection