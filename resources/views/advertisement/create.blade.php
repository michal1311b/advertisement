@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create advertisement</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                            <div class="col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-md-9">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="work">Work</label>
                            <div class="col-md-9">
                                <select class="custom-select" name="work" id="work">
                                    <option selected>Choose...</option>
                                    <option value="1">bar, restauracja i gastronomia</option>
                                    <option value="2">biuro i administracja</option>
                                    <option value="3">praca na budowie i pracownicy fizyczni</option>
                                    <option value="3">fachowcy</option>
                                    <option value="3">finanse i księgowość</option>
                                    <option value="3">grafika i web design</option>
                                    <option value="3">hostessy, modele i aktorzy</option>
                                    <option value="3">hr, kadry i rekrutacja</option>
                                    <option value="3">inżynierowie, technicy i architekci</option>
                                    <option value="3">kierowcy i kurierzy</option>
                                    <option value="3">kontrola i inwentaryzacja</option>
                                    <option value="3">krawiectwo i moda</option>
                                    <option value="3">magazynier</option>
                                    <option value="3">mlm</option>
                                    <option value="3">nauczyciele i edukacja</option>
                                    <option value="3">obsługa klienta i call center</option>
                                    <option value="3">ochrona</option>
                                    <option value="3">opiekunki i nianie</option>
                                    <option value="3">pielęgnacja i uroda</option>
                                    <option value="3">praca dla studentów</option>
                                    <option value="3">Three</option>
                                    <option value="3">Three</option>
                                    <option value="3">Three</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
