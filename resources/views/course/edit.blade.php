@extends('layouts.app')

@section('title')
    {{ $course->title }}
@endsection

@section('description')
{{ trans('sentence.register-course') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('course-edit', $course) !!}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.edit-courses') }}</div>

                <div class="card-body">
                    <edit-course 
                    :course="{{ $course }}"
                    :states="{{ $states }}"
                    :locations="{{ $locations }}"
                    :specializations="{{ $specializations }}"
                    :currencies="{{ $currencies }}"></edit-course>
                </div>

                @if($course->avatar)
                    <div class="card-footer">
                        <div class="col-12 col-md-4">
                            <a href="{{ route('delete-course-photo', $course->id) }}" class="btn btn-danger">{{ trans('sentence.btn-delete') }}</a>
                            <img src="{{ $course->avatar }}" alt="{{ $course->title }}" class="d-block w-100 py-2 gallery-item"/>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection