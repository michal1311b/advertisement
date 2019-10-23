@extends('layouts.app')

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
            {!! Breadcrumbs::render('tag.list', str_replace('-', ' ', request()->segment(3))) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center">
                    {{ __('Search by:') }}
                    <span class="ml-4 badge badge-pill badge-info text-white">{{ str_replace('-', ' ', request()->segment(3)) }}</span>
                </li>
            </ul>
        </div>
        @if(count($pins) > 0)
            @foreach($pins as $pin)
                @if($pin->post->is_published === 1)
                    <div class="col-12 col-md-6">
                        <a href="{{ route('blog.show', ['slug' => $pin->post->slug]) }}" class="no-decoration"> 
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($pin->post->cover)
                                                <img src="{{ $pin->post->cover }}" class="card-img" alt="{{ $pin->post->title }}">
                                            @else
                                                <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-title pt-3">{{ $pin->post->title }}</h5>
                                            <div class="card-text">
                                                <div class="ellipsis">{!! $pin->post->body !!}</div>
                                                <p><small class="text-muted">{{ __('Created at:') }} <strong>{{ $pin->post->created_at }}</strong></small></p>                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            <div class="col-12">
                {{ $pins->links() }}
            </div>
        @else
            <div class="col-12">
                <h4>{{ __('No posts found') }}</h4>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@endsection