@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit advertisement</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-advertisement') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-12 col-md-3 col-form-label text-md-right">Title</label>

                            <div class="col-12 col-md-9">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $advertisement->title }}" autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-12 col-md-3 col-form-label text-md-right">Description</label>

                            <div class="col-12 col-md-9">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $advertisement->description }}" autocomplete="description" autofocus rows="3">{{ $advertisement->description }}</textarea>
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
                                        @if($advertisement->work_id === $work->id)
                                        <option value="{{ $work->id }}" selected>{{ $work->name }}</option>
                                        @else
                                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                                        @endif
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
                                        @if($advertisement->state_id === $state->id)
                                            <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                        @else
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @foreach($advertisement->galleries as $image)
                                <div class="col-12 col-md-4">
                                    <a href="/advertisement/photo/{{ $image->id }}/delete" class="btn btn-danger">Delete</a>
                                    <img src="{{ $image->path }}" alt="{{ $image->oldName }}" class="d-block w-100 pt-2 gallery-item"/>
                                </div>
                            @endforeach
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
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $advertisement->city }}" autocomplete="city" autofocus>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-12 col-md-3 col-form-label text-md-right">Post code</label>

                            <div class="col-12 col-md-9">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ $advertisement->postCode }}" autocomplete="postCode" autofocus>
                                @error('postCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-12 col-md-3 col-form-label text-md-right">Street</label>

                            <div class="col-12 col-md-9">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ $advertisement->street }}" autocomplete="street" autofocus>
                                @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-3 col-form-label text-md-right">E-mail</label>

                            <div class="col-12 col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $advertisement->email }}" autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-12 col-md-3 col-form-label text-md-right">Phone</label>

                            <div class="col-12 col-md-9">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $advertisement->phone }}" autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update
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