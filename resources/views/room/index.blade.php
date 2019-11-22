@extends('layouts.app')

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('rooms') !!}
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
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ trans('sentence.first_name') }}</th>
                    <th scope="col">{{ trans('sentence.room_name') }}</th>
                    <th scope="col">{{ trans('sentence.reply') }}</th>
                </tr>
            </thead>
            <tbody>
            @if(count($rooms) > 0)
                @foreach($rooms as $room)
                    <tr>
                        <th scope="row">{{ $loop->index }}</th>
                        <td>{{ $room->user->email }}</td>
                        <td>{{ $room->user->name }}</td>
                        <td>{{ $room->room->name }}</td>
                        <td>
                            <a href="{{ route('show-room', $room->room_id) }}" class="btn btn-success">{{ trans('sentence.reply') }}</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <strong>{{ trans('sentence.no-message') }}</strong>
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