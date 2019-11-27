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
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.phone') }}
                                        <span class="badge badge-pill">{{ $advertisement->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.settlement') }}
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.salary') }}
                                        <span class="badge badge-pill">{{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.work-category') }}
                                        <span class="badge badge-pill">{{ $advertisement->settlement->name }}</span>
                                    </li>
                                </ul>

                                <div class="py-3">
                                    <div id="map" style="height: 440px; border: 1px solid #AAA;"></div>
                                </div>

                                <div class="py-2">
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
                                    <div class="font-italic text-muted mb-2 small ellipsis">{!! $similar->description !!}</div>
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
    </div>
</div>
@endsection

@section('scripts')
<script>
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
        center: [{{ $advertisement->location->latitude }}, {{ $advertisement->location->longitude }}],
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
}
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
@endsection