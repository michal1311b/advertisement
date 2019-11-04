@extends('layouts.app')

@section('title')
    {{ __('Page list') }}
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
        <a href="{{ route('posts.create') }}" class="btn btn-success">{{__('Create')}}</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Is publish?')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Edit')}}</th>
                        <th scope="col">{{__('Delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if($post->is_published === 0)
                                    {{__('No')}}
                                @else
                                    {{__('Yes')}}
                                @endif
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <a href="{{ route('posts.edit' , $post) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$post->id}}">Delete</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('posts.destroy', $post->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń kategorię",
                                    "description" => "Czy na pewno chcesz usunąć ten post?",
                                    "description_parameters" => [],
                                    'button' => 'Usuń',
                                    'modalKey' => "remove".$post->id
                                ])
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>No posts</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($posts->lastPage() > 1)
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection