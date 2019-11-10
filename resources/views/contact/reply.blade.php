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
            <strong>{{ trans('sentence.first_name') }}</strong> {{ $contact->first_name }}
            <br>
            <strong>{{ trans('sentence.city') }}</strong> {{ $contact->city }}
            <br>
            <strong>{{ trans('sentence.phone') }}</strong> {{ $contact->phone }}
            <br>
            <strong>{{ trans('sentence.message') }}</strong> {!! $contact->message !!}
            <br>
            <strong>{{ trans('sentence.files') }}</strong> 
            @if($contact->cv)
                <a href="{{ $contact->cv }}" _target="blank">{{ __('Open') }}</a>
            @else
                {{ trans('sentence.no-files') }}
            @endif
            <hr>
            @if(count($contact->replies) > 0)
                <strong>{{ trans('sentence.replies') }}</strong> {{ count($contact->replies) }}<br>
                @foreach($contact->replies as $reply)
                    <strong>{{ __('Email:') }}</strong> {{ $reply->email }}
                    <br><br>
                    <strong>{{ trans('sentence.message') }}</strong> {!! $reply->message !!}
                    <hr>
                @endforeach
            @else
                {{ trans('sentence.no-reply') }}
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