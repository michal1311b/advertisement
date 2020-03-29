@extends('layouts.app')

@section('title')
    {{ trans('sentence.your-preferences') }}
@endsection

@section('description')
    {{ trans('sentence.your-preferences') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('user-preferences') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            @if(count($preData) > 0)
                @foreach($preData as $data)
                    <!-- List group-->
                    <ul class="list-group shadow">
                        <a href="{{ route('show-advertisement', ['id' => $data->advertisements->id, 'slug' => $data->advertisements->slug]) }}" class="no-decoration"> 
                            <!-- list group item-->
                            <li class="list-group-item">
                                <!-- Custom content-->
                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="media-body order-2 order-lg-1">
                                        <h5 class="mt-0 font-weight-bold mb-2">{{ $data->advertisements->title }}</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                            <h6 class="font-weight-bold my-2"><i class="fas fa-coins"></i> {{ $data->advertisements->settlement->name }}: {{ $data->advertisements->min_salary }} - {{ $data->advertisements->max_salary }} {{ $data->advertisements->currency->symbol }}</h6>
                                        </div>
                                        <div class="badge badge-secondary">{{ $data->advertisements->specialization->name }}</div>
                                    </div>
                                    @if($data->advertisements->galleries()->count())
                                        <img src="{{ $data->advertisements->galleries[0]->path }}" width="200" class="ml-lg-5 order-1 order-lg-2" alt="{{$data->advertisements->galleries[0]->oldName}}">
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
            @else
                <div class="col-12">
                    <a href="{{ route('edit-user', $user) }}">
                        <h4>{{ trans('offer.no-preffred-offers') }}</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection