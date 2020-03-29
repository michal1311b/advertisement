@extends('layouts.site')

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
                        <th scope="col">{{ trans('profile.name') }}</th>
                        <th scope="col">{{ trans('email.email') }}</th>
                        <th scope="col">{{ trans('buttons.btn-ban') }}</th>
                        <th scope="col">{{ __('Online') }}</th>
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
                                        <button type="submit" class="btn btn-rounded btn-danger border border-warning">{{ trans('buttons.btn-ban') }}</button>  
                                    </form>
                                @else
                                    <form method="post" action="{{ route('users.unblock', $user) }}">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-rounded btn-success border border-warning">{{ trans('buttons.btn-unban') }}</button>  
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if(Cache::has('user-is-online-' . $user->id))
                                    <span class="text-success"><i class="fa fa-circle"></i> Online</span>
                                @else
                                    <span class="text-secondary"><i class="fa fa-circle"></i> Offline</span>
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