@extends('layouts.app')

@section('title')
    {{ __('List of offers') }}
@endsection

@section('css')
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
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
<div class="container py-5">
    <div class="row">
        <div class="col-12 pb-3">
            <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
        </div>
        <div class="col-lg-12 mx-auto">
            @include('partials.search')
            @if(count($advertisements) > 0)
                @foreach($advertisements as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $advertisement->title }}</h5>
                                    <div class="font-italic text-muted mb-2 small ellipsis">{!! $advertisement->description !!}</div>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $advertisement->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $advertisement->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                    <div>
                                        {{ trans('sentence.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
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
                <div class="pt-3">
                    {{ $advertisements->links() }}
                </div>
            @else
                <div class="col-12">
                    <a href="{{ route('create-advertisement') }}">
                        <h4>{{ trans('sentence.no-offers') }}</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
markers = [
    @foreach($advertisements as $advertisement)
        {
            "name": "{{ $advertisement->location->city }}",
            "lat": {{ $advertisement->location->latitude }},
            "lng": {{ $advertisement->location->longitude }},
            "slug": "{{ route('show-advertisement', ['id' => $advertisement->id, 'slug' => $advertisement->slug]) }}",
            "min_salary": {{ $advertisement->min_salary }},
            "max_salary": {{ $advertisement->max_salary }},
            "currency": "{{ $advertisement->currency->symbol }}",
        },
   @endforeach
];
var map = L.map( 'map', {
        center: [52.237049, 21.017532],
        minZoom: 2,
        zoom: 6
    });

L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a','b','c']
}).addTo( map );

for ( var i=0; i < markers.length; ++i ) 
{
   L.marker( [markers[i].lat, markers[i].lng] )
      .bindPopup( '<a href="' + markers[i].slug + '" target="_blank">' + markers[i].name + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency + '</a>' )
      .addTo( map );
}
</script>
@endsection