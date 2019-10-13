@extends('layouts.app')

<<<<<<< HEAD
=======
@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('home') !!}
        </div>
    </div>	
</div>
@endsection
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <a href="/nagrody-ankieta" class="btn btn-success">Ankietowani PTA</a>
                    <a href="/nagrody-suby" class="btn btn-success">Subskrybenci N4D</a>
                </div>
                <div class="card-body">
                    <a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a>
=======
                    You are logged in!
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
