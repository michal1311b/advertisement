@extends('layouts.app')

@section('title')
    {{ __('User offers list') }}
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
            {!! Breadcrumbs::render('user-advertisements') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            @if(count($advertisements) > 0)
                @foreach($advertisements as $advertisement)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', $advertisement->slug) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $advertisement->title }}</h5>
                                        <div class="font-italic text-muted mb-0 small ellipsis">{!! $advertisement->description !!}</div>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2">{{ __('Salary per hour:') }} {{ $advertisement->min_salary }} - {{ $advertisement->max_salary }}</h6>
                                        </div>
                                        <div class="badge badge-secondary">{{ $advertisement->specialization->name }}</div>
                                    </div>
                                    @if($advertisement->galleries()->count())
                                        <img src="{{ $advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->galleries[0]->oldName}}">
                                    @else
                                        <img src="{{ asset('images/noImage.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                    @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                    <div class="btn-group btn-group-toggle py-2">
                        <a href="{{ route('edit-advertisement', $advertisement->id) }}" class="btn btn-info border border-warning mr-2 text-white">{{ __('Edit') }}</a>

                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="#modalremove{{$advertisement->id}}">{{ __('Delete') }}</i>
                        </button>
                        @include('partials.confirmation', [
                            'url' => route('delete-advertisement', $advertisement->id),
                            'method' => 'DELETE',
                            'title' => "Usuń ogłoszenie",
                            "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                            "description_parameters" => [],
                            'button' => 'Usuń',
                            'modalKey' => "remove".$advertisement->id
                        ])
                    </div>
                @endforeach
                <div class="pt-3">
                    {{ $advertisements->links() }}
                </div>
            @else
                <div class="col-12">
                    <h4>{{ __('No advertisements found') }}</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection