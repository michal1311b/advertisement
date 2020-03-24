@extends('layouts.app')

@section('title')
    {{ trans('sentence.courses') }}
@endsection

@section('description')
    {{ trans('sentence.homepage.employmed') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('user-courses') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            @if(count($courses) > 0)
                <div class="pt-3">
                    {{ $courses->links() }}
                </div>
                @foreach($courses as $course)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-course', ['id' => $course->id, 'slug' => $course->slug]) }}" class="no-decoration" title="{{ $course->title }}"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold my-2">{{ $course->title }}</h5>
                                    <h6 class="mt-0 font-weight-bold mb-2"><i class="fas fa-map-marker-alt"></i> {{ $course->location->city }}</h6>
                                    <h6 class="mt-0 mb-2"><i class="fas fa-user-md"></i> {{ $course->user->profile->company_name }}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold"><i class="fas fa-coins"></i> {{ $course->price }} {{ $course->currency->symbol }}</h6>
                                    </div>
                                    <div class="badge badge-secondary">{{ $course->specialization->name }}</div>
                                    <div>
                                        <i class="fas fa-calendar-day"></i> {{ trans('sentence.start_date') }} <span class="badge badge-primary">{{ $course->start_date }}</span> - {{ trans('sentence.end_date') }} <span class="badge badge-primary">{{ $course->end_date }}</span>
                                    </div>
                                </div>
                                @if($course->avatar !== null)
                                    <img src="{{ $course->avatar }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{ $course->title }}">
                                @else
                                <img src="{{ asset('images/course-default.png') }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="No image">
                                @endif
                                </div>
                                <!-- End -->
                            </li>
                            <!-- End -->
                        </a>
                    </ul>
                    <!-- End -->
                    <div class="btn-group btn-group-toggle py-2">
                        <a href="{{ route('edit-course', $course->id) }}" class="btn btn-info border border-warning mr-2 text-white">{{ trans('sentence.edit') }}</a>

                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="#modalremove{{$course->id}}">{{ trans('sentence.btn-delete') }}</i>
                        </button>
                        @include('partials.confirmation', [
                            'url' => route('delete-user-course', $course->id),
                            'method' => 'DELETE',
                            'title' => "Usuń kurs",
                            "description" => "Czy na pewno chcesz usunąć ten kurs?",
                            "description_parameters" => [],
                            'button' => trans('sentence.btn-delete'),
                            'modalKey' => "remove".$course->id
                        ])

                        <a href="{{ route('user-course-participants', ['id' => $course->id]) }}" class="btn btn-info border border-warning ml-2 text-white">
                            {{ trans('sentence.participants') }}
                        </a>
                    </div>
                @endforeach
                <div class="pt-3">
                    {{ $courses->links() }}
                </div>
            @else
                <div class="col-12">
                    <a href="{{ route('store-company-course') }}">
                        <h4>{{ trans('sentence.no-courses') }}</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection