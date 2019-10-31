@extends('layouts.app')

@section('title')
    {{ __('User offers list') }}
@endsection

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
            {!! Breadcrumbs::render('user-advertisements') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($advertisements as $advertisement)
            <div class="col-12">
                <div class="card mb-3" style="max-width: 640px;">
                    <a href="{{ route('user-advertisement-show', $advertisement->slug) }}" class="no-decoration"> 
                        <div class="card-body">
                            <div class="col-md-4">
                                @if($advertisement->galleries()->count())
                                    <img src="{{ $advertisement->galleries[0]->path }}" class="card-img" alt="{{ $advertisement->galleries[0]->oldName }}">
                                @else
                                    <img src="{{ asset('images/noImage.png') }}" class="card-img" alt="No image">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">{{ $advertisement->title }}</h5>
                                <div class="card-text">
                                    <div class="ellipsis">{!! $advertisement->description !!}</div>
                                    <p><small class="text-muted">{{ __('Created at:') }} <strong>{{ $advertisement->created_at }}</strong></small></p>      
                                    @if(Auth::id() === $advertisement->user->id)
                                        <div class="btn-group btn-group-toggle">
                                            <a href="{{ route('edit-advertisement', $advertisement->id) }}" class="btn btn-info border border-warning mr-2">{{ __('Edit') }}</a>
                                            
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalremove{{$advertisement->id}}">{{ __('Delete') }}</i>
                                            </button>
                                            @include('partials.confirmation', [
                                                'url' => route('delete-advertisement', $advertisement->id),
                                                'method' => 'DELETE',
                                                'title' => "Usuń ogłoszenie",
                                                "description" => "Czy na pewno chcesz usunąć to ogłoszenie?",
                                                "description_parameters" => [],
                                                'button' => 'Usuń',
                                                'modalKey' => "remove".$advertisement->id
                                            ])
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
    </div>
</div>
@endsection

@section('scripts')
@endsection