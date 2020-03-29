@extends('layouts.app')

@section('title')
    {{ trans('offer.user-offers') }}
@endsection

@section('description')
    {{ trans('offer.user-offers') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('user-foreigns') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-lg-12 mx-auto">
            @if(count($foreigns) > 0)
                @foreach($foreigns as $foreign)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-foreign', ['id' => $foreign->id, 'slug' => $foreign->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $foreign->title }}</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2"><i class="fas fa-coins"></i> {{ $foreign->settlement->name }}: {{ $foreign->min_salary }} - {{ $foreign->max_salary }} {{ $foreign->currency->symbol }}</h6>
                                            <h6 class="font-weight-bold ml-3 my-2">
                                                <img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Like"> {{ $foreign->likes_count }}
                                                <br><i class="fas fa-eye"></i> {{ trans('offer.visits') }} {{ $foreign->foreign_visits_count }}
                                            </h6>
                                        </div>
                                        <div class="badge badge-secondary">{{ $foreign->specialization->name }}</div>
                                        <div>
                                            <i class="fas fa-calendar-day"></i> {{ trans('offer.expired_at') }} <div class="badge badge-primary">{{ $foreign->expired_at }}</div>
                                        </div>
                                    </div>
                                    @if($foreign->image_profile !== null)
                                        <img src="{{ $foreign->image_profile }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $foreign->title }}">
                                    @else
                                        <img src="{{ $foreign->user->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                    @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                    <div class="btn-group btn-group-toggle py-2 flex-wrap">
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

                        {{-- <a href="{{ route('user-foreign-show', ['foreign' => $foreign, 'slug' => $foreign->slug]) }}" class="btn btn-rounded btn-info border border-warning ml-2 text-white">
                            {{ trans('buttons.btn-matching') }}
                        </a> --}}

                        <a href="{{ route('user-foreign-similar', $foreign) }}" class="btn btn-rounded btn-success border border-warning ml-2 text-white">{{ trans('buttons.btn-create-similar-ofert') }}</a>

                        @if($date->diffInDays($foreign->expired_at) < 7)
                            <a href="{{ route('user-extend-foreign', $foreign->id) }}" class="btn btn-rounded btn-warning border border-warning ml-md-2 text-white">{{ trans('buttons.btn-extend-offer') }}</a>
                        @endif
                    </div>
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
@endsection