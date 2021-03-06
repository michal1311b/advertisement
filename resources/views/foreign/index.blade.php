@extends('layouts.site')

@section('title')
    {{ trans('offer.offers-list') }}
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
            {!! Breadcrumbs::render('foreign') !!}
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
        @if(isset($specialization))
            <div class="col-12 pb-3">
                {{ trans('offer.specialization-offers') }}
                <span class="ml-2 btn btn-sm offer-item border{{ $specialization->id }} text-white">
                    {{ $specialization->name }}
                    <img src="{{ asset('images/icons/' . $specialization->id . '.jpg') }}" 
                    class="rounded-circle" alt="{{ $specialization->name }}">
                </span>
            </div>
        @endif
        <div class="col-lg-12 mx-auto">
            @include('partials.search-foreign')
            @if(count($foreigns) > 0)
                <div class="pt-3">
                    {{ $foreigns->links() }}
                </div>
                @foreach($foreigns as $foreign)
                    <!-- List group-->
                    <ul class="list-group shadow offer-item color{{ $foreign->specialization_id }}"  id="o{{ $foreign->id }}">
                        <a href="{{ route('show-foreign', ['id' => $foreign->id, 'slug' => $foreign->slug]) }}" class="no-decoration" title="{{ $foreign->title }}"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $foreign->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $foreign->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $foreign->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $foreign->settlement->name }}: {{ $foreign->min_salary }} - {{ $foreign->max_salary }} {{ $foreign->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-pill offer-item border{{ $foreign->specialization_id }} text-white">
                                        {{ $foreign->specialization->name }}
                                        <img src="{{ asset('images/icons/' . $foreign->specialization->id . '.jpg') }}" 
                                        class="rounded-circle" alt="{{ $foreign->specialization->name }}">
                                    </div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $foreign->expired_at }}</div>
                                    </div>
                                </div>
                                @if($foreign->image_profile !== null)
                                    <img src="{{ $foreign->image_profile }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $foreign->user->name }}">
                                @else
                                    <img src="{{ $foreign->user->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <div class="pop-up" id="popup{{ $foreign->id }}">
                        <div id="map{{ $foreign->id }}" style="height: 220px; border: 1px solid #AAA;"></div>
                     </div>
                    <!-- End -->
                    @if(Auth::user() && Auth::user()->hasRole('admin'))
                        <div class="col-md-12">
                            <div class="btn-group btn-group-toggle py-2">
                                <a href="{{ route('edit-foreign', $foreign->id) }}" class="btn btn-rounded btn-info border border-warning mr-2 text-white">{{ trans('sentence.edit') }}</a>
                                
                                <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$foreign->id}}">{{ trans('buttons.btn-delete') }}</i>
                                </button>
                                @include('partials.confirmation', [
                                    'url' => route('delete-foreign', $foreign->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń ogłoszenie",
                                    "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                                    "description_parameters" => [],
                                    'button' => trans('buttons.btn-delete'),
                                    'modalKey' => "remove".$foreign->id
                                ])
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="pt-3">
                    {{ $foreigns->links() }}
                </div>
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
// document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        @foreach($foreigns as $foreign)
            {
                "id": "{{ $foreign->specialization->id }}",
                "name": "{{ $foreign->city }}",
                "street": "{{ $foreign->street }}",
                "lat": {{ $foreign->latitude }},
                "lng": {{ $foreign->longitude }},
                "slug": "{{ route('show-foreign', ['id' => $foreign->id, 'slug' => $foreign->slug]) }}",
                "min_salary": {{ $foreign->min_salary }},
                "max_salary": {{ $foreign->max_salary }},
                "currency": "{{ $foreign->currency->symbol }}",
                "specialization": "{{ $foreign->specialization->name }}",
            },
    @endforeach
    ];
    var map = L.map( 'map', {
        center: [54.547049, 25.197532],
        minZoom: 2,
        zoom: 4
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
            title: markers[i].name + ', ' + markers[i].street + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency + ', ' + markers[i].specialization
        })
        .addTo( map )
        .bindPopup( '<a href="' + markers[i].slug + '" target="_blank">' + markers[i].name + ', ' + markers[i].street + ',<br>' + markers[i].specialization + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency +'</a>', customOptions );
    }

    var moveLeft = 20;
    var moveDown = 10;

    @foreach($foreigns as $foreign)
        $(function() {
            document.getElementById('map' + {{ $foreign->id }}).innerHTML = "<div id='map{{ $foreign->id }}' style='width: 100%; height: 100%;'></div>";
            
            $('#o' + {{ $foreign->id }}).hover(function(e) {
                $('#popup' + {{ $foreign->id }}).show();
                let map{{ $foreign->id }} = L.map( 'map'+{{ $foreign->id }}, {
                    center: [{{ $foreign->latitude }}, {{ $foreign->longitude }}],
                    minZoom: 2,
                    zoom: 15
                });

                L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    subdomains: ['a','b','c']
                }).addTo( map{{ $foreign->id }} );

                let icon{{ $foreign->id }} = L.icon({ 
                    iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + {{ $foreign->specialization_id }} + '.jpg',
                    iconSize: [26, 26],
                });
                L.marker( 
                [{{ $foreign->latitude }}, {{ $foreign->longitude }}],
                { 
                    icon: icon{{ $foreign->id }}
                })
                .addTo( map{{ $foreign->id }} );
            }, function() {
                $('#popup' + {{ $foreign->id }}).hide();
            });

            $('#o' + {{ $foreign->id }}).mousemove(function(e) {
                $('#popup' + {{ $foreign->id }}).css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
            });
        });
    @endforeach
});
</script>
@endsection