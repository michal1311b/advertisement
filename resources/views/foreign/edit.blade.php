@extends('layouts.app')

@section('title')
    {{ $foreign->title }}
@endsection

@section('description')
    {!! $foreign->user->name !!}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('foreign-edit', $foreign) !!}
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
                <div class="card-header">{{ trans('profile.edit-offer') }}</div>

                <div class="card-body">
                    <edit-foreign 
                    :foreign="{{ $foreign }}"
                    :works="{{ $works }}" 
                    :specializations="{{ $specializations }}"
                    :currencies="{{ $currencies }}"
                    :settlements="{{ $settlements }}"></edit-foreign>

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