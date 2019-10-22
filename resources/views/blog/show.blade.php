@extends('layouts.app')

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('blog-post', $post) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Show post: <strong>{{ $post->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <strong>Posted by: </strong> {{ $post->user->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pb-2">
                                <img src="{{ $post->cover }}" class="w-100" alt="{{ $post->title }}"/>
                            </div>
                            <div class="col-12 pb-2">
                                {{ __('Tags:') }}
                                @foreach($post->pins as $pin)
                                    <a href="{{ route('postTag', ['tagSlug' => $pin->slug]) }}">
                                        <span class="badge badge-pill badge-info">
                                            {{ $pin->name }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Created at:') }}
                                        <span class="badge badge-pill">{{ $post->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ __('Updated at:') }}
                                        <span class="badge badge-pill">{{ $post->created_at }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 pt-2">
                                <h4><strong>{{ __('Description:') }}</strong></h4>
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12">
            @include('partials.contact')
        </div> --}}
    </div>
</div>
@endsection

@section('scripts')
@endsection