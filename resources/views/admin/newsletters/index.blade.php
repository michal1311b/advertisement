@extends('layouts.app')

@section('title')
    {{ __('newsletter list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('newsletters') !!}
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
            <a href="{{ route('newsletters.create') }}" class="btn btn-success">{{trans('sentence.btn-create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('sentence.title')}}</th>
                        <th scope="col">{{trans('sentence.subject')}}</th>
                        <th scope="col">{{trans('sentence.sending_date')}}</th>
                        <th scope="col">{{trans('sentence.edit')}}</th>
                        <th scope="col">{{trans('sentence.btn-delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($newsletters) > 0)
                    @foreach($newsletters as $newsletter)
                        <tr>
                            <th scope="row">{{ $newsletter->id }}</th>
                            <td>{{ $newsletter->title }}</td>
                            <td>{{ $newsletter->subject }}</td>
                            <td>{{ $newsletter->sending_date }}</td>
                            <td>
                                <a href="{{ route('newsletters.edit' , $newsletter) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$newsletter->id}}">Delete</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('newsletters.destroy', $newsletter->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń newsletter",
                                    "description" => "Czy na pewno chcesz usunąć ten newsletter?",
                                    "description_parameters" => [],
                                    'button' => trans('sentence.btn-delete'),
                                    'modalKey' => "remove".$newsletter->id
                                ])
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>{{__('No newsletters')}}</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($newsletters->lastPage() > 1)
            <div class="card-footer">
                {{ $newsletters->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection