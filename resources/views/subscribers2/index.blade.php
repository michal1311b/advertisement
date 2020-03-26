@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="get" action="{{ route('search-code') }}">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="search" placeholder="Szukaj...">
                        <button type="submit" class="btn btn-rounded btn-success border border-warning">Szukaj</button>
                        <a href="/nagrody-suby" class="btn btn-rounded btn-danger">Resetuj</a>
                    </form>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <td>Imie</td>
                                <td>Nazwisko</td>
                                <td>Email</td>
                                <td>Kod</td>
                                <td>Czy odebrał nagrodę?</td>
                                <td>Nazwa wydarzenia</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcribers as $subcriber)
                            <tr>
                                <td>{{ $subcriber->first_name }}</td>
                                <td>{{ $subcriber->last_name }}</td>
                                <td>{{ $subcriber->email }}</td>
                                <td>{{ $subcriber->invitation }}</td>
                                <td>
                                    @if($subcriber->got_price)
                                    <span class="btn btn-rounded btn-success">ODEBRANE</span>
                                    @else
                                    <form method="post" action="{{ route('get-price2', $subcriber->id) }}">
                                        {{ method_field('PUT') }}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-rounded btn-warning border border-warning">Zatwierdź odbiór</button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $subcriber->event_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
