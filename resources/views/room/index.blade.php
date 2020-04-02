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
    <div class="row table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('email.email') }}</th>
                    <th scope="col">{{ trans('profile.users') }}</th>
                    <th scope="col">{{ trans('sentence.room_name') }}</th>
                    <th scope="col">{{ trans('email.reply') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(count($rooms) > 0)
                    @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>
                                {{ $room->room->user->email }}, 
                                {{ $room->room->recipient->email }}
                            </td>
                            <td>
                                {{ $room->room->user->name }}, 
                                {{ $room->room->recipient->name }}
                            </td>
                            <td>{{ $room->room->name }}</td>
                            <td>
                                <a href="{{ route('show-room', $room->room_id) }}" class="btn btn-rounded btn-success">{{ trans('email.reply') }}</a>
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
        <div class="pt-3">
            {{ $rooms->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection