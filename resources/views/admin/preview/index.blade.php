@extends('layouts.site')

@section('title')
    {{ __('jooble list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('jooblies') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('sentence.title')}}</th>
                        <th scope="col">{{__('E-mail')}}</th>
                        <th scope="col">{{trans('sentence.edit')}}</th>
                        <th scope="col">{{trans('sentence.show')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($jooblies) > 0)
                    @foreach($jooblies as $jooble)
                        <tr>
                            <th scope="row">{{ $jooble->id }}</th>
                            <td>{{ $jooble->title }}</td>
                            <td>{{ $jooble->email }}</td>
                            <td>
                                <a href="{{ route('preview-edit' , $jooble) }}" class="btn btn-rounded btn-success">
                                    {{ trans('sentence.btn-edit') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('preview-show' , $jooble) }}" class="btn btn-rounded btn-info">
                                    {{ trans('sentence.show') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>{{__('No categoires')}}</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($jooblies->lastPage() > 1)
            <div class="card-footer">
                {{ $jooblies->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection