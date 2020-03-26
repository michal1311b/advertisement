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
            {!! Breadcrumbs::render('participants', $course) !!}
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
                        <th scope="col">{{ trans('sentence.last_name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ trans('sentence.phone') }}</th>
                        <th scope="col">{{ __('Info') }}</th>
                        <th scope="col">{{ trans('sentence.btn-delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($participants) > 0)
                    @foreach($participants as $participant)
                        <tr>
                            <th scope="row">{{ $participant->id }}</th>
                            <td>{{ $participant->first_name }}</td>
                            <td>{{ $participant->last_name }}</td>
                            <td>{{ $participant->email }}</td>
                            <td>{{ $participant->phone }}</td>
                            <td>

                                <a href="{{ route('user-course-participant-show', ['companycourse' => $course->id, 'id' => $participant->id]) }}" class="btn btn-rounded btn-info text-white">
                                    {{ trans('sentence.btn-info') }}
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                    data-target="#modalremove{{$participant->id}}">{{ trans('sentence.btn-delete') }}</i>
                                </button>

                                @include('partials.confirmation', [
                                    'url' => route('delete-participant', $participant->id),
                                    'method' => 'DELETE',
                                    'title' => "Usuń uczestnika",
                                    "description" => "Czy na pewno chcesz usunąć uczestnika kursu?",
                                    "description_parameters" => [],
                                    'button' => trans('sentence.btn-delete'),
                                    'modalKey' => "remove".$participant->id
                                ])
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <strong>{{ trans('sentence.no-participants')}}</strong>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        @if($participants->lastPage() > 1)
            <div class="card-footer">
                {{ $participants->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
@endsection