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
            {!! Breadcrumbs::render('advertisement') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('search-advertisement') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                                <a href="{{ route('advertisement-list') }}" class="btn btn-outline-secondary" id="button-addon2">Clear search</a>
                            </div>
                            <input type="text" class="form-control" name="q" placeholder="Search advertisement" aria-label="Search advertisement" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if(count($advertisements) > 0)
            @foreach($advertisements as $advertisement)
                <div class="col-12">
                    <div class="card mb-3" style="max-width: 640px;">
                        <a href="show/{{ $advertisement->slug }}" class="no-decoration"> 
                            <div class="card-body">
                                <div class="col-md-4">
                                    @if($advertisement->galleries()->count())
                                        <img src="{{ $advertisement->galleries[0]->path }}" class="card-img" alt="$advertisement->galleries[0]->oldName">
                                    @else
                                        <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $advertisement->title }}</h5>
                                    <div class="card-text">
                                        <div class="ellipsis">{!! $advertisement->description !!}</div>
                                        <p><small class="text-muted">Created at: <strong>{{ $advertisement->created_at }}</strong></small></p>      
                                        @if(Auth::id() === $advertisement->user->id)
                                        <div class="btn-group btn-group-toggle">
                                            <a href="{{ route('edit-advertisement', $advertisement->id) }}" class="btn btn-info border border-warning mr-2">Edit</a>
                                            <form method="get" action="{{ route('delete-advertisement', $advertisement->id) }}">
                                                {{ method_field('DELETE') }}
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-danger border border-warning">Usuń</button>  
                                            </form>
                                        </div>     
                                        @endif  
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{ $advertisements->links() }}
            </div>
        @else
            <div class="col-12">
                <h4>No advertisements found</h4>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@endsection