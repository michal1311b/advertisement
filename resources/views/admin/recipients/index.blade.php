@extends('layouts.site')

@section('title')
    {{ __('recipient list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('recipients') !!}
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
        <div class="col-12 text-right">
            <a href="{{ route('recipients.create') }}" class="btn btn-rounded btn-success">{{trans('buttons.btn-create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('email.email') }}</th>
                        <th scope="col">{{trans('sentence.edit')}}</th>
                        <th scope="col">{{trans('buttons.btn-delete')}}</th>
                        <th scope="col">{{trans('email.mailinglist-list')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($recipients) > 0)
                    @foreach($recipients as $recipient)
                        <tr>
                            <th scope="row">{{ $recipient->id }}</th>
                            <td>{{ $recipient->email }}</td>
                            <td>
                                <a href="{{ route('recipients.edit' , $recipient) }}" class="btn btn-rounded btn-success">{{trans('sentence.edit')}}</a>
                            </td>
                            <td>
                                <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$recipient->id}}">{{trans('buttons.btn-delete')}}</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('recipients.destroy', $recipient->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń odbiorcę",
                                    "description" => "Czy na pewno chcesz usunąć tego odbiorcę?",
                                    "description_parameters" => [],
                                    'button' => trans('buttons.btn-delete'),
                                    'modalKey' => "remove".$recipient->id
                                ])
                            </td>
                            <td>
                                {{ $recipient->mailinglist->title }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>{{__('No posts')}}</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($recipients->lastpage() > 1)
            <div class="card-footer">
                {{ $recipients->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection