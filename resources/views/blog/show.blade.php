@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

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
                <div class="card-header">{{ __('Show post:') }} <strong>{{ $post->title }}</strong></div>

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
        <div class="col-md-12">
            @if(auth()->user())
                @include('partials.comment')
            @else
                <div class="alert alert-danger">
                    <a href="{{ route('login')}}" class="text-white">{{ __('Sign in to comment posts') }}</a>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            @if($comments)
                @foreach($comments as $comment)
                    <div class="media my-3 row">
                        <div class="col-12 col-md-3">
                            <img src="{{ $comment->author->avatar }}" class="img-fluid align-self-start mr-3" alt="{{ $comment->author->avatar }}">
                        </div>
                        
                        <div class="media-body col-12 col-md-9">
                          <h5 class="mt-0">{{ $comment->author->name }}</h5>
                          <h6 class="mt-0">{{ __('Created at:') }} {{ $comment->created_at }}</h5>
                          {!! $comment->content !!}
                        </div>
                    </div>
                @endforeach

                {{ $comments->links() }}
            @else
                <div class="alert alert-danger">
                    <a href="{{ route('login')}}" class="text-white">{{ __('There\'s no comments') }}</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection