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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('email.email') }}</th>
                    <th scope="col">{{ trans('profile.first_name') }}</th>
                    <th scope="col">{{ trans('offer.city') }}</th>
                    <th scope="col">{{ trans('offer.phone') }}</th>
                    <th scope="col">{{ trans('email.reply') }}</th>
                </tr>
            </thead>
            <tbody>
            @if(count($contacts) > 0)
                @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $loop->index }}</th>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->first_name }}</td>
                        <td>{{ $contact->city }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <a href="{{ route('user-reply', $contact->id) }}" class="btn btn-rounded btn-success">{{ trans('email.reply') }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <strong>{{ trans('email.message') }}</strong>
                            {!! $contact->message !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <strong>{{ trans('email.no-message') }}</strong>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
@endsection