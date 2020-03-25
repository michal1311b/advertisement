@extends('layouts.app')

@section('title')
    {{ trans('sentence.user-offers') }}
@endsection

@section('description')
    {{ trans('sentence.user-offers') }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('user-advertisement-article', $advertisement) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ trans('sentence.btn-details') }} <strong>{{ $advertisement->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        @if(count($candidates) > 0)
                            @foreach($candidates as $candidate)
                                @if($candidate->doctor !== null || $candidate->nurse !== null)
                                    <div class="row profile">
                                        <div class="col-12 col-md-4">
                                            <div class="profile-sidebar">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic">
                                                    <img src="{{ $candidate->avatar }}" class="img-responsive" alt="">
                                                </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                                <div class="profile-usertitle">
                                                    <div class="profile-usertitle-name">
                                                        {{ $candidate->name }} {{ $candidate->profile->last_name }}
                                                    </div>
                                                    <div class="profile-usertitle-job">
                                                        <div>{{ trans('sentence.specializations') }}</div>
                                                        @if(count($candidate->specializations) > 0)
                                                            <ul>
                                                                @foreach($candidate->specializations as $specialization)
                                                                    <li>
                                                                        {{ $specialization->name }}
                                                                        @if($specialization->pivot->is_pending)
                                                                            ({{ trans('sentence.pending') }})
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- END SIDEBAR USER TITLE -->
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="profile-content">
                                                @if($candidate->doctor !== null)
                                                    <a href="{{ $candidate->doctor->cv }}" class="btn btn-primary" target="_blank">{{ __('CV') }}</a>
                                                @endif
                                                @if($candidate->nurse !== null)
                                                    <a href="{{ $candidate->nurse->cv }}" class="btn btn-primary" target="_blank">{{ __('CV') }}</a>
                                                @endif
                                                <ul class="nav pt-3">
                                                    <li>{{ $candidate->profile->post_code }} {{ $candidate->profile->city }}</li>
                                                </ul>

                                                @if(count($candidate->courses) > 0)
                                                    <div class="font-weight-bolder">{{ trans('sentence.courses') }}</div>
                                                    <ul>
                                                        @foreach($candidate->courses as $course)
                                                            <li>
                                                                {{ $course->name }}, {{ $course->organizer }}, {{ $course->start_date }} - {{ $course->end_date }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                                @if(count($candidate->experiences) > 0)
                                                    <div class="font-weight-bolder">{{ trans('sentence.experience') }}</div>
                                                    <ul>
                                                        @foreach($candidate->experiences as $experience)
                                                            <li>
                                                                <div>
                                                                    {{ $experience->workplace }}, {{ $experience->exp_city }}, {{ $experience->exp_company_name }}, {{ $experience->start_date }} - {{ $experience->end_date }}
                                                                </div>
                                                                <div>
                                                                    <strong>{{ trans('sentence.responsibilities') }}</strong>
                                                                </div>
                                                                <div>{!! $experience->responsibility !!}</div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="row">
                                <div class="col-12">
                                    {{ $candidates->links() }}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12">
                                    {{ trans('sentence.no-candidates') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection