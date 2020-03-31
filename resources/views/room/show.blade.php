@extends('layouts.app')

@section('title')
    {{ __('Chat room') }}
@endsection

@section('description')
    {{ __('Chat room') }}
@endsection


@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('room', $messages[0]->room) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($messages as $message)
            <div class="col-md-12" id="#message{{ $message->id }}">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset($message->user->avatar) }}" alt="avatar" class="user-avatar user-avatar--smaller">
                        {{ $message->user->name }}
                        @if($message->user->isOnline())
                            <span class="text-success"><i class="fa fa-circle"></i> Online</span>
                        @else
                            <span class="text-secondary"><i class="fa fa-circle"></i> Offline</span>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    {!! $message->message !!}
                                    @if($message->user->doctor && $message->user->doctor->cv && $loop->index === 0)
                                        <a href="{{$message->user->doctor->cv}}" class="btn btn-rounded btn-primary">{{ trans('profile.show-cv') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12" id="paginate">
            {{ $messages->links() }}
        </div>
        <span class="btn btn-rounded btn-success" onclick="openInNewTab()">
            {{ trans('email.open-new-tab') }}
        </span>
        <div class="col-12">
            <div class="card">
                <div class="card-footer">
                    <form action="{{ route('reply-room', $messages[0]->room) }}" method="POST">
                        @csrf
                        <textarea class="form-control mb-4" name="reply" placeholder="{{ trans('email.reply-form') }}"></textarea>
                        <button type="submit" class="btn btn-rounded btn-success mt-3">{{ trans('email.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/usedInViews/scrollMessage.js') }}"></script>
@endsection