<div class="tab-pane container fade" id="menu2">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ trans('sentence.edit-courses') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('store-course', $editUser) }}">
                    @csrf
                    @if($editUser->doctor !== null || $editUser->nurse !== null)
                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.name') }}</label>

                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" autocomplete="name" autofocus>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="organizer" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.organizer') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" value="" autocomplete="organizer" autofocus>
                                @error('organizer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.start_date') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="start_course" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.end_date') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="end_course" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                                @error('end_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-left">
                                <button type="submit" class="btn btn-rounded btn-success">
                                    {{ trans('sentence.btn-add') }}
                                </button>
                            </div>
                        </div>
                    @endif
                </form>

                @foreach($editUser->courses as $course)
                    <div class="row pt-3">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.name') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $course->name }}
                        </div>

                        <div class="col-12 col-md-2 btn-group text-right">

                            <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                data-target="#modalremovecourse{{$course->id}}">{{ trans('sentence.btn-delete') }}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-course', $course->id),
                                'method' => 'DELETE',
                                'title' => trans('sentence.btn-delete') . " " . trans('sentence.course'),
                                "description" => trans('sentence.delete_confirm') . " " . trans('sentence.course') . "?",
                                "description_parameters" => [],
                                'button' => trans('sentence.btn-delete'),
                                'modalKey' => "removecourse".$course->id
                            ])

                            <button class="btn btn-rounded btn-success" data-toggle="modal"
                                data-target="#modaleditcourse{{$course->id}}">{{ trans('sentence.btn-edit') }}</i>
                            </button>

                            @include('partials.edit-course', [
                                'url' => route('update-course', $course),
                                'method' => 'PUT',
                                'title' => trans('sentence.edit'),
                                "description" => trans('sentence.edit_confirm') . " " . trans('sentence.course') . "?",
                                "description_parameters" => [],
                                'button' => trans('sentence.btn-edit'),
                                'modalKey' => "editcourse".$course->id
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.company_name') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $course->organizer }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.start') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $course->start_date }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.end') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $course->end_date }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>