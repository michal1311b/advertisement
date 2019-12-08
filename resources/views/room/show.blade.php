@extends('layouts.app')

@section('title')
    {{ __('Chat room') }}
@endsection

@section('description')
    {{ __('Chat room') }}
@endsection

@section('tinymce')
<script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('js/tinymce2.js') }}"></script>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset($message->user->avatar) }}" alt="avatar" class="user-avatar user-avatar--smaller">
                        {{ $message->user->name }}
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    {!! $message->message !!}
                                    @if($message->user->doctor && $message->user->doctor->cv && $loop->index === 0)
                                        <a href="{{$message->user->doctor->cv}}" class="btn btn-primary">{{ trans('sentence.show-cv') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12">
            {{ $messages->links() }}
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-footer">
                    <form action="{{ route('reply-room', $messages[0]->room) }}" method="POST">
                        @csrf
                        <textarea class="form-control mb-4" name="reply" placeholder="Reply"></textarea>
                        <button type="submit" class="btn btn-success mt-3">{{ trans('sentence.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection