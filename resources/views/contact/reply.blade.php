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
        <div class="col-12">
            <strong>Email:</strong> {{ $contact->email }}
            <hr>
            <strong>First Name:</strong> {{ $contact->first_name }}
            <hr>
            <strong>City:</strong> {{ $contact->city }}
            <hr>
            <strong>Phone:</strong> {{ $contact->phone }}
            <hr>
            <strong>Message:</strong> {!! $contact->message !!}
        </div>
        <div class="col-12">
             @include('partials.reply')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection