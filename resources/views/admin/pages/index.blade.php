@extends('layouts.app')

@section('title')
    {{ __('page list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('pages') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-right">
        <a href="{{ route('pages.create') }}" class="btn btn-success">{{__('Create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Title')}}</th>
                        <th scope="col">{{__('Edit')}}</th>
                        <th scope="col">{{__('Delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($pages) > 0)
                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ route('pages.edit' , $page) }}" class="btn btn-success">{{__('Edit')}}</a>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$page->id}}">{{__('Delete')}}</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('pages.destroy', $page->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń stronę",
                                    "description" => "Czy na pewno chcesz usunąć tę stronę?",
                                    "description_parameters" => [],
                                    'button' => 'Usuń',
                                    'modalKey' => "remove".$page->id
                                ])
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

        @if($pages->lastPage() > 1)
            <div class="card-footer">
                {{ $pages->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection