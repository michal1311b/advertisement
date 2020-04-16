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
            {!! Breadcrumbs::render('advertisement') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @include('partials.search')
        </div>
        <div class="col-12">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center">
                    <span class="pr-2">{{ trans('sentence.search-by')}}</span> 
                    <ul class="tags">
                        <li>
                            <span class="tag">
                                {{ str_replace('-', ' ', request()->segment(3)) }}
                            </span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @if(count($advertisements) > 0)
            <div class="col-lg-12 mx-auto">
                @foreach($advertisements as $advertisement)
                    @if($advertisement->advertisement !== null)
                        <!-- List group-->
                        <ul class="list-group shadow offer-item color{{ $advertisement->advertisement->specialization_id }}" id="o{{ $advertisement->advertisement->id }}">
                            <a href="{{ route('show-advertisement', ['id' => $advertisement->advertisement->id, 'slug' => $advertisement->advertisement->slug]) }}" class="no-decoration" title="{{ $advertisement->advertisement->title }}"> 
                                <!-- list group item-->
                                <li class="list-group-item">
                                    <!-- Custom content-->
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h5 class="mt-0 font-weight-bold mb-2">{{ $advertisement->advertisement->title ?? '' }}</h5>
                                            <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->advertisement->location->city ?? '' }}</h6>
                                            <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->advertisement->user->profile->company_name ?? '' }}</h6>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <h6 class="font-weight-bold my-2"><i class="fas fa-coins"></i> {{ $advertisement->advertisement->settlement->name ?? '' }}: {{ $advertisement->advertisement->min_salary ?? '' }} - {{ $advertisement->advertisement->max_salary ?? '' }} {{ $advertisement->advertisement->currency->symbol ?? '' }}</h6>
                                            </div>
                                            <div class="badge badge-pill offer-item border{{ $advertisement->advertisement->specialization_id }} text-white">
                                                {{ $advertisement->advertisement->specialization->name ?? '' }}
                                                <img src="{{ asset('images/icons/' . $advertisement->advertisement->specialization->id . '.jpg') }}" 
                                                class="rounded-circle" alt="{{ $advertisement->advertisement->specialization->name }}">
                                            </div>
                                            <div>
                                                <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $advertisement->advertisement->expired_at ?? '' }}</div>
                                            </div>
                                        </div>
                                        @if($advertisement->advertisement->galleries()->count())
                                            <img src="{{ $advertisement->advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->advertisement->galleries[0]->oldName}}">
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
                        <div class="pop-up" id="popup{{ $advertisement->advertisement->id }}">
                            <div id="map{{ $advertisement->advertisement->id }}" style="height: 220px; border: 1px solid #AAA;"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-12">
                {{ $advertisements->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" integrity="sha256-SHMGCYmST46SoyGgo4YR/9AlK1vf3ff84Aq9yK4hdqM=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js" integrity="sha256-fNoRrwkP2GuYPbNSJmMJOCyfRB2DhPQe0rGTgzRsyso=" crossorigin="anonymous"></script>
<script>
    var moveLeft = 20;
    var moveDown = 10;

    @foreach($advertisements as $advertisement)
        @if($advertisement->advertisement !== null)
            $(function() {
                document.getElementById('map' + {{ $advertisement->advertisement->id }}).innerHTML = "<div id='map{{ $advertisement->advertisement->id }}' style='width: 100%; height: 100%;'></div>";
                
                $('#o' + {{ $advertisement->advertisement->id }}).hover(function(e) {
                    $('#popup' + {{ $advertisement->advertisement->id }}).show();
                    let map{{ $advertisement->advertisement->id }} = L.map( 'map'+{{ $advertisement->advertisement->id }}, {
                        center: [{{ $advertisement->advertisement->latitude }}, {{ $advertisement->advertisement->longitude }}],
                        minZoom: 2,
                        zoom: 15
                    });

                    L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                        subdomains: ['a','b','c']
                    }).addTo( map{{ $advertisement->advertisement->id }} );

                    let icon{{ $advertisement->advertisement->id }} = L.icon({ 
                        iconUrl: '{{ URL::asset('/images/icons/') }}' + '/' + {{ $advertisement->advertisement->specialization_id }} + '.jpg',
                        iconSize: [26, 26],
                    });
                    L.marker( 
                    [{{ $advertisement->advertisement->latitude }}, {{ $advertisement->advertisement->longitude }}],
                    { 
                        icon: icon{{ $advertisement->advertisement->id }}
                    })
                    .addTo( map{{ $advertisement->advertisement->id }} );
                }, function() {
                    $('#popup' + {{ $advertisement->advertisement->id }}).hide();
                });

                $('#o' + {{ $advertisement->advertisement->id }}).mousemove(function(e) {
                    $('#popup' + {{ $advertisement->advertisement->id }}).css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
                });
            });
        @endif
    @endforeach
</script>
@endsection