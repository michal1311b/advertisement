@extends('layouts.app')

@section('title')
    {{ trans('sentence.visitors-list') }}
@endsection

@section('description')
    {{ trans('sentence.homepage.employmed') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('visitors') !!}
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
        @foreach($visitors as $visitor)
            {
                "city": "{{ $visitor->city }}",
                "country": "{{ $visitor->country }}",
                "lat": {{ $visitor->latitude }},
                "lng": {{ $visitor->longitude }},
                "email": "{{ $visitor->email }}",
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
            iconUrl: '{{ URL::asset('/images/icons/human-marker.png') }}',
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
            title: markers[i].city + ', ' + markers[i].country + ', ' + markers[i].email
            })
        .addTo( map )
        .bindPopup( markers[i].city + ', ' + markers[i].country + ', ' + markers[i].email, customOptions );
    }
});
</script>
@endsection