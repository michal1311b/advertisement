@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            {{__('Lista języków')}}
            <a class="btn btn-sm btn-primary float-right mr-1" href="{{ route('language.create') }}" >
                {{__('Dodaj język')}}
            </a>
        </div>
        <div class="card-body p-5">

           <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Nazwa')}}</th>
                        <th scope="col">{{__('Nazwa lokalna')}}</th>
                        <th scope="col">{{__('Edytuj')}}</th>
                        <th scope="col">{{__('Usuń')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <th scope="row">
                            </th>
                            <td>
                                {{ $language->name }}
                            </td>
                            <td>
                                {{ $language->local_name }}
                            </td>
                            <td>
                                <a href="{{ route('language.edit', $language->lang_key) }}" class="btn btn-warning">{{__('Edytuj')}}</a>
                            </td>
                            <td>
                                <form action="{{ route('language.delete', $language->lang_key)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="{{__('Usuń')}}" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
