@extends('layouts.app')

@section('title')
    {{ trans('sentence.edit') . ' ' . $editUser->name }}
@endsection

@section('description')
    {{ trans('sentence.edit') . ' ' . $editUser->name }}
@endsection

@section('tinymce')
<script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/tinymce2.js') }}"></script>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('edit-user', $editUser) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>

        @if($editUser->doctor != null)
            @if($editUser->hasRole('doctor') && isset($editUser->doctor->share))
                <div class="col-md-12 text-right">
                    <form method="POST" action="{{ route('share-profile', $editUser) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="type" value="doctor">
                        @csrf
                        <button type="submit" class="btn btn-rounded {{ $editUser->doctor->share ? 'btn-danger' : 'btn-primary' }}">
                            {{ $editUser->doctor->share ? trans('buttons.btn-unshare') : trans('buttons.btn-share') }}
                        </button>
                    </form>
                </div>
            @endif
        @endif

        @if($editUser->nurse != null)
            @if($editUser->hasRole('nurse') && isset($editUser->nurse->share))
                <div class="col-md-12 text-right">
                    <form method="POST" action="{{ route('share-profile', $editUser) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="type" value="nurse">
                        @csrf
                        <button type="submit" class="btn btn-rounded {{ $editUser->nurse->share ? 'btn-danger' : 'btn-primary' }}">
                            {{ $editUser->nurse->share ? trans('buttons.btn-unshare') : trans('buttons.btn-share') }}
                        </button>
                    </form>
                </div>
            @endif
        @endif

        @if($editUser->doctor || $editUser->nurse)
            @if(
                count($userLocations) == 0 ||
                ($editUser->preference->work_id == null ||
                $editUser->preference->settlement_id == null ||
                $editUser->preference->currency_id == null ||
                $editUser->preference->min_salary == null))
                <div class="col-md-12 text-center">
                    <div class="alert alert-info">
                        {!! trans('sentence.matching-info') !!}
                    </div>
                </div>
            @endif
        @endif

        <div class="col-md-12 py-3">
              <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">{{ __('Home') }}</a>
                </li>
                @if($editUser->doctor || $editUser->nurse)
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu1">
                            {{ trans('sentence.experience') }} 
                            @if(count($editUser->experiences) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.fill-experience') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu2">
                            {{ trans('sentence.courses') }} 
                            @if(count($editUser->courses) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.fill-courses') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu3">
                            {{ trans('sentence.languages') }} 
                            @if(count($userLanguages) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.fill-languages') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu4">
                            {{ trans('profile.preferences') }} 
                            @if(
                                !$editUser->preference->work_id ||
                                !$editUser->preference->settlement_id ||
                                !$editUser->preference->currency_id ||
                                !$editUser->preference->min_salary)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.fill-preferences') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu4a">
                            {{ trans('offer.locations') }} 
                            @if(count($userLocations) == 0)
                                <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.fill-locations') }}">!</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warning" data-toggle="tab" href="#menu5">
                            {{ __('CV') }} 
                            @if($editUser->doctor != null)
                                @if($editUser->doctor->cv === null)
                                    <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.add-cv') }}">!</span>
                                @endif
                            @endif
                            @if($editUser->nurse != null)
                                @if($editUser->nurse->cv === null)
                                    <span class="badge blue-tooltip" data-toggle="tooltip" title="{{ trans('profile.add-cv') }}">!</span>
                                @endif
                            @endif
                        </a>
                    </li>
                @endif
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                @include('user.tabs.menuHome')
                @if($editUser->doctor != null || $editUser->nurse != null)
                    @include('user.tabs.menuExperience')
                    @include('user.tabs.menuCourses')
                    @include('user.tabs.menuLanguage')
                    @include('user.tabs.menuPreference')
                    @include('user.tabs.menuLocation')
                    @include('user.tabs.menuCV')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection