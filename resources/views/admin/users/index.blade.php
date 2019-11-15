@extends('layouts.app')

@section('title')
    {{ __('User list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('users') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('sentence.name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ trans('sentence.btn-ban') }}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(is_null($user->banned_until))
                                    <form method="post" action="{{ route('users.block', $user) }}">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger border border-warning">{{ trans('sentence.btn-ban') }}</button>  
                                    </form>
                                @else
                                    <form method="post" action="{{ route('users.unblock', $user) }}">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-success border border-warning">{{ trans('sentence.btn-unban') }}</button>  
                                    </form>
                                @endif
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

        @if($users->lastPage() > 1)
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection