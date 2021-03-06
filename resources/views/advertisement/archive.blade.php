@extends('layouts.site')

@section('title')
    {{ trans('offer.offers-archive') }}
@endsection

@section('description')
    {{ trans('offer.offers-archive-descripion') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('archive') !!}
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
            @include('partials.search')
            @if(count($advertisements) > 0)
                <div class="pt-3">
                    {{ $advertisements->links() }}
                </div>
                @foreach($advertisements as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow offer-item color{{ $advertisement->specialization_id }}" id="o{{ $advertisement->id }}">
                        <a href="{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}" class="no-decoration" title="{{ $advertisement->title }}"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-pill offer-item border{{ $advertisement->specialization_id }} text-white">{{ $advertisement->specialization->name }}</div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
                                    </div>
                                </div>
                                <img src="{{ asset('images/archived.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="Archiwe">
                                
                                @if($advertisement->galleries()->count())
                                    <img src="{{ $advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->galleries[0]->oldName}}">
                                @else
                                    <img src="{{ $advertisement->user->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                    <div class="pop-up" id="popup{{ $advertisement->id }}">
                        <div id="map{{ $advertisement->id }}" style="height: 220px; border: 1px solid #AAA;"></div>
                     </div>
                    @if(Auth::user() && Auth::user()->hasRole('admin'))
                        <div class="col-md-12">
                            <div class="btn-group btn-group-toggle py-2">
                                <a href="{{ route('edit-advertisement', $advertisement->id) }}" class="btn btn-rounded btn-info border border-warning mr-2 text-white">{{ trans('sentence.edit') }}</a>
                                
                                <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$advertisement->id}}">{{ trans('buttons.btn-delete') }}</i>
                                </button>
                                @include('partials.confirmation', [
                                    'url' => route('delete-advertisement', $advertisement->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń ogłoszenie",
                                    "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                                    "description_parameters" => [],
                                    'button' => trans('buttons.btn-delete'),
                                    'modalKey' => "remove".$advertisement->id
                                ])
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="pt-3">
                    {{ $advertisements->links() }}
                </div>
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
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" integrity="sha256-SHMGCYmST46SoyGgo4YR/9AlK1vf3ff84Aq9yK4hdqM=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js" integrity="sha256-fNoRrwkP2GuYPbNSJmMJOCyfRB2DhPQe0rGTgzRsyso=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
// document.getElementById('map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
    markers = [
        @foreach($advertisements as $advertisement)
            {
                "id": "{{ $advertisement->specialization->id }}",
                "name": "{{ $advertisement->location->city }}",
                "street": "{{ $advertisement->street }}",
                "lat": {{ $advertisement->latitude }},
                "lng": {{ $advertisement->longitude }},
                "slug": "{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}",
                "min_salary": {{ $advertisement->min_salary }},
                "max_salary": {{ $advertisement->max_salary }},
                "currency": "{{ $advertisement->currency->symbol }}",
                "specialization": "{{ $advertisement->specialization->name }}",
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
            title: markers[i].name + ', ' + markers[i].street + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency + ', ' + markers[i].specialization
        })
        .addTo( map )
        .bindPopup( '<a href="' + markers[i].slug + '" target="_blank">' + markers[i].name + ', ' + markers[i].street + ',<br>' + markers[i].specialization + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency +'</a>', customOptions );
    }

    var moveLeft = 20;
    var moveDown = 10;

    @foreach($advertisements as $advertisement)
        $(function() {
            document.getElementById('map' + {{ $advertisement->id }}).innerHTML = "<div id='map{{ $advertisement->id }}' style='width: 100%; height: 100%;'></div>";
            
            $('#o' + {{ $advertisement->id }}).hover(function(e) {
                $('#popup' + {{ $advertisement->id }}).show();
                let map{{ $advertisement->id }} = L.map( 'map'+{{ $advertisement->id }}, {
                    center: [{{ $advertisement->latitude }}, {{ $advertisement->longitude }}],
                    minZoom: 2,
                    zoom: 15
                });

                L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    subdomains: ['a','b','c']
                }).addTo( map{{ $advertisement->id }} );

                let icon{{ $advertisement->id }} = L.icon({ 
                    iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + {{ $advertisement->specialization_id }} + '.jpg',
                    iconSize: [26, 26],
                });
                L.marker( 
                [{{ $advertisement->latitude }}, {{ $advertisement->longitude }}],
                { 
                    icon: icon{{ $advertisement->id }}
                })
                .addTo( map{{ $advertisement->id }} );
            }, function() {
                $('#popup' + {{ $advertisement->id }}).hide();
            });

            $('#o' + {{ $advertisement->id }}).mousemove(function(e) {
                $('#popup' + {{ $advertisement->id }}).css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
            });
        });
    @endforeach
});
</script>
@endsection