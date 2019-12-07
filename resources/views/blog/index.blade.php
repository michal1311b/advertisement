@extends('layouts.site')

@section('title')
    {{ __('EmployMed Blog') }}
@endsection

@section('description')
    {{ __('EmployMed Blog') }}
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
        @if(count($categories) > 0)
            <div class="col-md-12 py-3">
                <ul class="nav nav-pills nav-fill">
                    @foreach($categories as $cat)
                        <li class="nav-item px-2">
                            <a class="nav-link 
                                @if(isset($category))
                                    @if($cat->id === $category->id)
                                        active
                                    @endif
                                @endif"
                                href="{{ route('blog.category', $cat->id) }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(count($posts) > 0)
            @foreach($posts as $post)
                @if($post->is_published === 1)
                    <div class="col-12 col-md-6">
                        <a href="{{ route('blog.show', $post->slug) }}" class="no-decoration" title="{{ $post->title }}"> 
                            <div class="card mb-3" style="max-width: 640px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($post->cover)
                                                <img src="{{ $post->cover }}" class="card-img" alt="{{ $post->title }}">
                                            @else
                                                <img src="{{ asset('images/logo.png') }}" class="card-img" alt="No image">
                                            @endif
                                        </div>
                                        <div class="col-md-8 pt-3 pt-md-0">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <div class="card-text">
                                                <div class="ellipsis">{!! $post->body !!}</div>
                                                <p><small class="text-muted">{{ trans('sentence.created_at') }} <strong>{{ $post->created_at }}</strong></small></p>      
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
                <h4>{{ trans('sentence.no-post') }}</h4>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@endsection