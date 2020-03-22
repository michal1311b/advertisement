@extends('layouts.site')

@section('title')
    {{ __('Category list') }}
@endsection

@section('css')
<style></style>
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('categories') !!}
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
            <a href="{{ route('categories.create') }}" class="btn btn-success">{{trans('sentence.btn-create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('sentence.name')}}</th>
                        <th scope="col">{{__('Is active?')}}</th>
                        <th scope="col">{{trans('sentence.edit')}}</th>
                        <th scope="col">{{trans('sentence.btn-delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->is_active }}</td>
                            <td>
                                <a href="{{ route('categories.edit' , $category) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$category->id}}">Delete</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('categories.destroy', $category->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń kategorię",
                                    "description" => "Czy na pewno chcesz usunąć tę kategorię?",
                                    "description_parameters" => [],
                                    'button' => trans('sentence.btn-delete'),
                                    'modalKey' => "remove".$category->id
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

        @if($categories->lastPage() > 1)
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection