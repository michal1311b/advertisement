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
                <div class="card-header">Show advertisement: <strong>{{ $advertisement->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <strong>{{ __('Posted by:') }}</strong> {{ $advertisement->user->profile->company_name }}
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
                            <div class="col-12 pb-2">
                                {{ __('Tags:') }}
                                @if(!$advertisement->tags)
                                    @foreach($advertisement->tags as $tag)
                                        <a href="{{ route('advertisementTag', ['tagSlug' => $tag->slug]) }}">
                                            <span class="badge badge-pill badge-info text-white">
                                                {{ $tag->name }}
                                            </span>
                                        </a>
                                    @endforeach
                                @else
                                    <span class="font-weight-bold">{{ __('There\'s no tags') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Logo:') }}
                                        <span class="badge badge-pill"><img class="user-avatar--smaller" src="{{ $advertisement->user->avatar }}" /></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('City:') }}
                                        <span class="badge badge-pill">{{ $advertisement->location->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('State:') }}
                                        <span class="badge badge-pill">{{ $advertisement->state->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Created at:') }}
                                        <span class="badge badge-pill">{{ $advertisement->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Phone:') }}
                                        <span class="badge badge-pill">{{ $advertisement->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Work type:') }}
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Salary:') }}
                                        <span class="badge badge-pill">{{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Settlement:') }}
                                        <span class="badge badge-pill">{{ $advertisement->settlement->name }}</span>
                                    </li>
                                </ul>

                                <div class="py-3">
                                    <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
                                </div>

                                <div class="py-2">
                                    <h4><strong>{{ __('Description:') }}</strong></h4>
                                    {!! $advertisement->description !!}
                                </div>

                                @if($advertisement->requirements !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ __('Requirements:') }}</strong></h4>
                                        {!! $advertisement->requirements !!}
                                    </div>
                                @endif

                                @if($advertisement->profits !== null)
                                    <div class="py-2">
                                        <h4><strong>{{ __('Profits:') }}</strong></h4>
                                        {!! $advertisement->profits !!}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div id="advertisementCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($advertisement->galleries as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="10000">
                                                <img src="{{ $image->path }}" class="d-block w-100" alt="{{ $image->oldName }}">
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
            @include('partials.contact')
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
markers = [
    {
        "name": "{{ $advertisement->location->city }}",
        "lat": {{ $advertisement->location->latitude }},
        "lng": {{ $advertisement->location->longitude }},
        "min_salary": {{ $advertisement->min_salary }},
        "max_salary": {{ $advertisement->max_salary }},
        "currency": "{{ $advertisement->currency->symbol }}",
    }
];
var map = L.map( 'map', {
        center: [{{ $advertisement->location->latitude }}, {{ $advertisement->location->longitude }}],
        minZoom: 2,
        zoom: 12
    });

L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a','b','c']
}).addTo( map );

for ( var i=0; i < markers.length; ++i ) 
{
   L.marker( [markers[i].lat, markers[i].lng] )
      .bindPopup( markers[i].name + ': ' + markers[i].min_salary + '-' + markers[i].max_salary + ' ' + markers[i].currency )
      .addTo( map );
}
$('#advertisementCarousel').carousel({
  interval: 2000
});
</script>
@endsection