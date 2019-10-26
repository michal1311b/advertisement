@extends('layouts.app')

@section('title')
    {{ __('Blog list') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('posts.list') !!}
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
        @if(count($posts) > 0)
            @foreach($posts as $post)
                @if($post->is_published === 1)
                    <div class="col-12 col-md-6">
                        <a href="{{ route('blog.show', $post->slug) }}" class="no-decoration"> 
                            <div class="card mb-3" style="max-width: 640px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($post->cover)
                                                <img src="{{ $post->cover }}" class="card-img" alt="{{ $post->title }}">
                                            @else
                                                <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                            @endif
                                        </div>
                                        <div class="col-md-8 pt-3 pt-md-0">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <div class="card-text">
                                                <div class="ellipsis">{!! $post->body !!}</div>
                                                <p><small class="text-muted">{{ __('Created at:') }} <strong>{{ $post->created_at }}</strong></small></p>      
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
                {{ $posts->links() }}
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