@extends('layouts.app')

@section('css')
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($advertisements as $advertisement)
            <div class="col-12">
                <div class="card mb-3 no-decoration" style="max-width: 540px;">
                    <a href="show/{{ $advertisement->slug }}"> 
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                @if($advertisement->galleries()->count())
                                    <img src="{{ $advertisement->galleries[0]->path }}" class="card-img" alt="$advertisement->galleries[0]->oldName">
                                @else
                                    <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $advertisement->title }}</h5>
                                    <div class="card-text">
                                        <div class="ellipsis">{!! $advertisement->description !!}</div>
                                        <p><small class="text-muted">Created at: <strong>{{ $advertisement->created_at }}</strong></small></p>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@endsection