@extends('layouts.app')

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('contacts') !!}
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
        <div class="col-12">
            <strong>{{ __('Email:') }}</strong> {{ $contact->email }}
            <br>
            <strong>{{ __('First Name:') }}</strong> {{ $contact->first_name }}
            <br>
            <strong>{{ __('City:') }}</strong> {{ $contact->city }}
            <br>
            <strong>{{ __('Phone:') }}</strong> {{ $contact->phone }}
            <br>
            <strong>{{ __('Message:') }}</strong> {!! $contact->message !!}
            <br>
            <strong>{{ __('Files:') }}</strong> 
            @if($contact->cv)
                <a href="{{ $contact->cv }}" _target="blank">{{ __('Open') }}</a>
            @else
                {{ __('There in no file') }}
            @endif
            <hr>
            @if(count($contact->replies) > 0)
                <strong>{{ __('Reply\'s count:') }}</strong> {{ count($contact->replies) }}<br>
                @foreach($contact->replies as $reply)
                    <strong>{{ __('Email:') }}</strong> {{ $reply->email }}
                    <br><br>
                    <strong>{{ __('Message:') }}</strong> {!! $reply->message !!}
                    <hr>
                @endforeach
            @else
                {{ __('No replies') }}
            @endif
        </div>
        <div class="col-12">
            @include('partials.reply')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection