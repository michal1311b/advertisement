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
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($advertisements as $advertisement)
                <div class="col-12">
                    <a href="show/{{ $advertisement->slug }}">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ $advertisement->galleries[0]->path }}" class="card-img" alt="$advertisement->galleries[0]->oldName">
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
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection