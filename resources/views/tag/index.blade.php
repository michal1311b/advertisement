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
<div class="container">
    <div class="row">
        @include('partials.search')
        <div class="col-12">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center">
                    {{ __('Search by:') }}
                    <span class="ml-4 badge badge-pill badge-info text-white">{{ str_replace('-', ' ', request()->segment(3)) }}</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-12 mx-auto">
            @foreach($advertisements as $advertisement)
                <!-- List group-->
                <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', $advertisement->advertisement->slug) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $advertisement->advertisement->title }}</h5>
                                        <div class="font-italic text-muted mb-0 small ellipsis">{!! $advertisement->advertisement->description !!}</div>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2">{{ __('Salary per hour:') }} {{ $advertisement->advertisement->min_salary }} - {{ $advertisement->advertisement->max_salary }}</h6>
                                        </div>
                                        <div class="badge badge-secondary">{{ $advertisement->advertisement->specialization->name }}</div>
                                    </div>
                                    @if($advertisement->advertisement->galleries()->count())
                                        <img src="{{ $advertisement->advertisement->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$advertisement->advertisement->galleries[0]->oldName}}">
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
                {{-- <div class="col-12">
                    <div class="card mb-3" style="max-width: 640px;">
                        <a href="{{ route('show-advertisement', ['slug' => $advertisement->advertisement->slug]) }}" class="no-decoration"> 
                            <div class="card-body">
                                <div class="col-md-4">
                                    @if($advertisement->advertisement->galleries()->count())
                                        <img src="{{ $advertisement->advertisement->galleries[0]->path }}" class="card-img" alt="{{ $advertisement->advertisement->galleries[0]->oldName }}">
                                    @else
                                        <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $advertisement->advertisement->title }}</h5>
                                    <div class="card-text">
                                        <div class="ellipsis">{!! $advertisement->advertisement->description !!}</div>
                                        <p><small class="text-muted">Created at: <strong>{{ $advertisement->advertisement->created_at }}</strong></small></p>      
                                        @if(Auth::id() === $advertisement->advertisement->user->id)
                                            <div class="btn-group btn-group-toggle">
                                                <a href="{{ route('edit-advertisement', $advertisement->advertisement->id) }}" class="btn btn-info border border-warning mr-2">{{ __('Edit') }}</a>

                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modalremove{{$advertisement->advertisement->id}}">{{ __('Delete') }}</i>
                                                </button>
                                                @include('partials.confirmation', [
                                                    'url' => route('delete-advertisement', $advertisement->advertisement->id),
                                                    'method' => 'DELETE',
                                                    'title' => "Usuń ogłoszenie",
                                                    "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                                                    "description_parameters" => [],
                                                    'button' => 'Usuń',
                                                    'modalKey' => "remove".$advertisement->advertisement->id
                                                ])
                                            </div>     
                                        @endif  
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
            @endforeach
        </div>
        <div class="col-12">
            {{ $advertisements->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection