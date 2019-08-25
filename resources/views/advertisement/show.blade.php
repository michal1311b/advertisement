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
            {!! Breadcrumbs::render('advertisement-article', $advertisement) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Show advertisement: <strong>{{ $advertisement->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <strong>Posted by:</strong> {{ $advertisement->user->name }}
                                @if(Auth::check())
                                @if (Auth::user()->isFollowing($advertisement->user->id))
                                    <div class="btn-group btn-group-toggle">
                                        <form action="{{ route('unfollow', ['id' => $advertisement->user->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-follow-{{ $advertisement->user->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Unfollow
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="btn-group btn-group-toggle">
                                        <form action="{{route('follow', ['id' => $advertisement->user->id])}}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" id="follow-user-{{ $advertisement->user->id }}" class="btn btn-success">
                                                <i class="fa fa-btn fa-user"></i>Follow
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                @endif
                            </div>
                            <div class="col-12 pb-2">
                                Tags:
                                @foreach($advertisement->tags as $tag)
                                    <a href="{{ route('advertisementTag', ['tagSlug' => $tag->name]) }}">
                                        <span class="badge badge-pill badge-info">
                                            {{ $tag->name }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        City:
                                        <span class="badge badge-pill">{{ $advertisement->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        State:
                                        <span class="badge badge-pill">{{ $advertisement->state->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Created at:
                                        <span class="badge badge-pill">{{ $advertisement->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Phone:
                                        <span class="badge badge-pill">{{ $advertisement->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Work category:
                                        <span class="badge badge-pill">{{ $advertisement->work->name }}</span>
                                    </li>
                                </ul>

                                <h4><strong>Description:</strong></h4>
                                {!! $advertisement->description !!}
                            </div>
                            <div class="col-12">
                                <div id="advertisementCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($advertisement->galleries as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="10000">
                                                <img src="{{ $image->path }}" class="d-block w-100" alt="{{ $image->oldName }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#advertisementCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#advertisementCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('partials.contact')
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$('#advertisementCarousel').carousel({
  interval: 2000
});
</script>
@endsection