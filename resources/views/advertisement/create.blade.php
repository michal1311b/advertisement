@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create advertisement</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-advertisement') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">Title</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="title" autofocus rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="work_id">Work</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select @error('work_id') is-invalid @enderror" name="work_id" id="work_id">
                                    <option selected>Choose...</option>
                                    @foreach($works as $work)
                                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                                    @endforeach
                                </select>
                                @error('work_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="state_id">State</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                    <option selected>Choose...</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="galleries">Upload files:</label>
                            <div class="col-12 col-md-9">
                                <input type="file" class="form-control @error('galleries') is-invalid @enderror" name="galleries[]" multiple />
                                @error('galleries')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-12 col-md-3 col-form-label text-md-right">City</label>

                            <div class="col-12 col-md-9">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">Post code</label>

                            <div class="col-12 col-md-9">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ old('postCode') }}" autocomplete="postCode" autofocus>
                                @error('postCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">Street</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">E-mail</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">Phone</label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags">Tagi</label>
                            <input type="text" value="" name="tags[]" id="tags" data-role="tagsinput" class="form-control" />
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input name="term1" type="hidden" value="0">
                                    <input class="form-check-input" value="1"
                                    type="checkbox" name="term1" {{ old('term1', 0) == 1 ? 'checked' : '' }}
                                    id="term1">

                                    <label class="form-check-label" for="term1">
                                        {{ __('term1') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input name="term2" type="hidden" value="0">
                                    <input value="1" class="form-check-input"
                                    type="checkbox" name="term2" id="term2"
                                    {{ old('term2', 0) == 1 ? 'checked' : '' }}>

                                    <label class="form-check-label" for="term2">
                                        {{ __('term2') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input name="term3" type="hidden" value="0">
                                    <input value="1" class="form-check-input"
                                    type="checkbox" name="term3" id="term3"
                                    {{ old('term3', 0)  == 1 ? 'checked' : '' }}>

                                    <label class="form-check-label" for="term3">
                                        {{ __('term3') }}
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