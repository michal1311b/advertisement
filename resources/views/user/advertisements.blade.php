@extends('layouts.app')

@section('title')
    {{ trans('sentence.user-offers') }}
@endsection

@section('description')
    {{ trans('sentence.user-offers') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('user-advertisements') !!}
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
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $advertisement->title }}</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2"><i class="fas fa-coins"></i> {{ $advertisement->settlement->name }}: {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }} {{ $advertisement->currency->symbol }}</h6>
                                            <h6 class="font-weight-bold ml-3 my-2"><i class="fas fa-eye"></i> {{ trans('sentence.visits') }} {{ count($advertisement->visits) }}</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                            <h6 class="font-weight-bold ml-3 my-2"><img src="{{ asset('images/like.png') }}" width="30" height="30" alt="Like"> {{ $advertisement->likes_count }}</h6>
                                        </div>
                                        <div>
                                            <i class="fas fa-calendar-day"></i> {{ trans('sentence.expired_at') }} <div class="badge badge-primary">{{ $advertisement->expired_at }}</div>
                                        </div>
                                    </div>
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
                    <div class="btn-group btn-group-toggle py-2 flex-wrap">
                        <a href="{{ route('edit-advertisement', $advertisement->id) }}" class="btn btn-rounded btn-info border border-warning mr-2 text-white">{{ trans('sentence.edit') }}</a>

                        <button class="btn btn-rounded btn-danger" data-toggle="modal"
                            data-target="#modalremove{{$advertisement->id}}">{{ trans('sentence.btn-delete') }}</i>
                        </button>
                        @include('partials.confirmation', [
                            'url' => route('delete-advertisement', $advertisement->id),
                            'method' => 'DELETE',
                            'title' => "Usuń ogłoszenie",
                            "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                            "description_parameters" => [],
                            'button' => trans('sentence.btn-delete'),
                            'modalKey' => "remove".$advertisement->id
                        ])

                        <a href="{{ route('user-advertisement-show', ['advertisement' => $advertisement, 'slug' => $advertisement->slug]) }}" class="btn btn-rounded btn-info border border-warning ml-md-2 text-white">
                            {{ trans('sentence.btn-matching') }}
                        </a>

                        <a href="{{ route('user-advertisement-similar', $advertisement) }}" class="btn btn-rounded btn-success border border-warning ml-md-2 text-white">{{ trans('sentence.btn-create-similar-ofert') }}</a>
                        
                        @if($date->diffInDays($advertisement->expired_at) < 7)
                            <a href="{{ route('user-extend-offer', $advertisement->id) }}" class="btn btn-rounded btn-warning border border-warning ml-md-2 text-white">{{ trans('sentence.btn-extend-offer') }}</a>
                        @endif
                    </div>
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
@endsection