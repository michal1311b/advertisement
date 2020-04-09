@extends('layouts.app')

@section('title')
    {{ trans('auth.verify') }}
@endsection

@section('description')
    {{ trans('auth.verify') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('notifications.verify-email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('notifications.fresh-verification-send') }}
                        </div>
                    @endif

                    {{ trans('notifications.check-email') }}
                    {{ trans('notifications.not-recive-email') }}, <a href="{{ route('verification.resend') }}">{{ trans('notifications.send-another-email') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
