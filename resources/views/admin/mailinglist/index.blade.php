@extends('layouts.app')

@section('title')
    {{ __('mailinglist list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('mailinglists') !!}
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
            <a href="{{ route('mailinglists.create') }}" class="btn btn-success">{{trans('sentence.btn-create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('sentence.title')}}</th>
                        <th scope="col">{{trans('sentence.edit')}}</th>
                        <th scope="col">{{trans('sentence.btn-delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($mailinglists) > 0)
                    @foreach($mailinglists as $mailinglist)
                        <tr>
                            <th scope="row">{{ $mailinglist->id }}</th>
                            <td>{{ $mailinglist->title }}</td>
                            <td>
                                <a href="{{ route('mailinglists.edit' , $mailinglist) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$mailinglist->id}}">Delete</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('mailinglists.destroy', $mailinglist->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń listę mailingową",
                                    "description" => "Czy na pewno chcesz usunąć tą listę mailingową?",
                                    "description_parameters" => [],
                                    'button' => trans('sentence.btn-delete'),
                                    'modalKey' => "remove".$mailinglist->id
                                ])
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>{{__('No mailing lists')}}</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($mailinglists->lastPage() > 1)
            <div class="card-footer">
                {{ $mailinglists->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection