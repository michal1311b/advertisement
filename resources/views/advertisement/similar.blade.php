@extends('layouts.app')

@section('title')
    {{ $advertisement->title }}
@endsection

@section('description')
    {!! $advertisement->user->name !!}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('advertisement-edit', $advertisement) !!}
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
                <div class="card-header">{{ trans('sentence.edit-offer') }}</div>

                <div class="card-body">
                    <similar-offer 
                    :advertisement="{{ $advertisement }}"
                    :works="{{ $works }}" 
                    :states="{{ $states }}"
                    :locations="{{ $locations }}"
                    :specializations="{{ $specializations }}"
                    :currencies="{{ $currencies }}"
                    :settlements="{{ $settlements }}"></similar-offer>
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