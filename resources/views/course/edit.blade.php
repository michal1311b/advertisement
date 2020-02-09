@extends('layouts.app')

@section('title')
    {{ $course->title }}
@endsection

@section('description')
    {!! $course->description !!}
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection