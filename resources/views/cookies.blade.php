@extends('layouts.site')

@section('title')
    {{ trans('sentence.cookies-policy') }}
@endsection

@section('description')
    {{ trans('sentence.cookies-policy') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('cookies') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.1') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{!! trans('cookies.1.1') !!}</li>
                                    <li>{{ trans('cookies.1.2') }}</li>
                                    <li>{!! trans('cookies.1.3') !!}</li>
                                    <li>{{ trans('cookies.1.4') }}</li>
                                    <li>
                                        {{ trans('cookies.1.5') }}<br>
                                        <ul>
                                            <li>{{ trans('cookies.1.5a') }}</li>
                                            <li>{{ trans('cookies.1.5b') }}</li>
                                            <li>{{ trans('cookies.1.5c') }}</li>
                                            <li>{{ trans('cookies.1.5d') }}</li>
                                            <li>{{ trans('cookies.1.5e') }}</li>
                                            <li>{{ trans('cookies.1.5f') }}</li>
                                            <li>{{ trans('cookies.1.5g') }}</li>
                                        </ul>
                                    </li>
                                    <li>
                                        {{ trans('cookies.1.6') }}<br>
                                        <ul>
                                            <li>{{ trans('cookies.1.6a') }}</li>
                                            <li>{{ trans('cookies.1.6b') }}</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.2') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.2.1') }}</li>
                                    <li>{{ trans('cookies.2.2') }}</li>
                                    <li>{{ trans('cookies.2.3') }}</li>
                                    <li>{{ trans('cookies.2.4') }}</li>
                                    <li>{{ trans('cookies.2.5') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.3') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.3.1') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.4') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>
                                        {{ trans('cookies.4.1') }}
                                        <ul>
                                            <li>{{ trans('cookies.4.1a') }}</li>
                                        </ul>
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.2') }}
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.3') }}
                                        <ul>
                                            <li>{{ trans('cookies.4.3a') }}</li>
                                            <li>{{ trans('cookies.4.3b') }}</li>
                                            <li>{{ trans('cookies.4.3c') }}</li>
                                            <li>{{ trans('cookies.4.3d') }}</li>
                                            <li>{{ trans('cookies.4.3e') }}</li>
                                        </ul>
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.4') }}
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.5') }}
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.6') }}
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.7') }}
                                    </li>
                                    <li>
                                        {{ trans('cookies.4.8') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.5') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.5.1') }}</li>
                                    <li>{{ trans('cookies.5.2') }}</li>
                                    <li>{{ trans('cookies.5.3') }}</li>
                                    <li>{{ trans('cookies.5.4') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.6') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.6.1') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.7') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{!! trans('cookies.7.1') !!}</li>
                                    <li>{{ trans('cookies.7.2') }}</li>
                                    <li>{{ trans('cookies.7.3') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.8') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.8.1') }}</li>
                                    <li>{{ trans('cookies.8.2') }}</li>
                                    <li>{{ trans('cookies.8.3') }}</li>
                                    <li>
                                        {{ trans('cookies.8.4') }}
                                        <ul>
                                            <li>{{ trans('cookies.8.4a') }}</li>
                                            <li>{{ trans('cookies.8.4b') }}</li>
                                        </ul>
                                    </li>
                                    <li>{{ trans('cookies.8.5') }}</li>
                                    <li>{{ trans('cookies.8.6') }}</li>
                                    <li>{{ trans('cookies.8.7') }}</li>
                                    <li>{{ trans('cookies.8.8') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{ trans('cookies.9') }}
                    </strong>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li>{{ trans('cookies.9.1') }}</li>
                                    <li>
                                        {{ trans('cookies.9.2') }}
                                        <ul>
                                            <li>
                                                <a href="https://support.microsoft.com/pl-pl/help/10607/microsoft-edge-view-delete-browser-history">
                                                    Edge
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://support.microsoft.com/pl-pl/help/278835/how-to-delete-cookie-files-in-internet-explorer">
                                                    Internet Explorer
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://support.google.com/chrome/answer/95647?hl=pl">
                                                    Google Chrome
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://support.apple.com/kb/PH5042">
                                                    Safari
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://support.mozilla.org/pl/kb/wlaczanie-i-wylaczanie-ciasteczek-sledzacych?redirectlocale=pl&redirectslug=W%C5%82%C4%85czanie+i+wy%C5%82%C4%85czanie+obs%C5%82ugi+ciasteczek">
                                                    Firefox
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://help.opera.com/pl/latest/web-preferences/#cookies">
                                                    Opera
                                                </a>
                                            </li>
                                        </ul>
                                        {{ trans('cookies.9.2a') }}
                                        <ul>
                                            <li>
                                                <a href="https://support.google.com/chrome/answer/95647?hl=pl">
                                                    Android
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://support.apple.com/pl-pl/HT201265">
                                                    Safari (iOS)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://support.microsoft.com/pl-pl/help/11696/windows-phone-7">
                                                    Windows Phone
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection