@extends('layouts.app')

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('edit-user', $user) !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit your profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-user', $user->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right">Profile Image</label>

                            <div class="col-12 col-md-9">
                                @if($user->avatar)
                                    <img src="{{ $user->avatar }}" class="user-avatar">
                                @else
                                    <img src="{{ asset('images/chicken-at-facebook.jpg') }}" class="user-avatar">
                                @endif
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-12 col-md-9">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            @if($user->provider_name)
                                <label for="password" class="col-12 col-md-3 col-form-label text-md-right"></label>

                                <div class="col-12 col-md-9">
                                <input id="password" type="hidden" value="null" name="password">
                            @else
                            <label for="password" class="col-12 col-md-3 col-form-label text-md-right">Password</label>
                            <div class="col-12 col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif
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