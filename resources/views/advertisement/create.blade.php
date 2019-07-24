@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create advertisement</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-advertisement') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">Title</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">Work</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select" name="work_id" id="work_id">
                                    <option selected>Choose...</option>
                                    @foreach($works as $work)
                                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">State</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select" name="state_id" id="state_id">
                                    <option selected>Choose...</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="photos">Upload files:</label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control @error('title') is-invalid @enderror" name="photos[]" multiple />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-12 col-md-3 col-form-label text-md-right">City</label>

                            <div class="col-12 col-md-9">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">Post code</label>

                            <div class="col-12 col-md-9">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ old('postCode') }}" required autocomplete="postCode" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">Street</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">E-mail</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">Phone</label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
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

@section('scripts')
<script>

</script>
@endsection