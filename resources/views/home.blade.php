@extends('layouts.app')

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

                    <a href="/nagrody-ankieta" class="btn btn-success">Ankietowani PTA</a>
                    <a href="/nagrody-suby" class="btn btn-success">Subskrybenci N4D</a>
                </div>
                <div class="card-body">
                    <a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
