<div class="tab-pane container fade" id="menu1">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ trans('sentence.edit-experience') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('store-experience', $editUser) }}">
                    @csrf
                    @if($editUser->doctor !== null || $editUser->nurse !== null)
                        <div class="form-group row">
                            <label for="workplace" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.workplace') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ $experience->workplace ?? '' }}" autocomplete="workplace" autofocus>
                                @error('workplace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exp_company_name" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('company.company_name') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="exp_company_name" type="text" class="form-control @error('exp_company_name') is-invalid @enderror" name="exp_company_name" value="{{ $experience->exp_company_name ?? '' }}" autocomplete="exp_company_name" autofocus>
                                @error('exp_company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exp_city" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.city') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="exp_city" type="text" class="form-control @error('exp_city') is-invalid @enderror" name="exp_city" value="{{ $experience->exp_city ?? '' }}" autocomplete="exp_city" autofocus>
                                @error('exp_city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.start_date') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $experience->start_date ?? '' }}" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                                @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.end_date') }}</label>

                            <div class="col-12 col-md-9">
                                <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $experience->end_date ?? '' }}" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                                @error('end_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input name="until_now" type="hidden" value="0">
                                    <input class="form-check-input custom-checkbox" 
                                    type="checkbox" name="until_now" id="until_now" value="1"
                                    {{ old('until_now', 0)  == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="until_now">
                                    {{ trans('sentence.until') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="responsibility" class="col-12 col-md-3 col-form-label text-md-right">{{ trans('sentence.responsibilities') }}</label>

                            <div class="col-12 col-md-9">
                                <textarea id="responsibility" type="responsibility" class="form-control @error('responsibility') is-invalid @enderror" name="responsibility" value="{{ old('responsibility') }}" autocomplete="responsibility" autofocus rows="3"></textarea>
                                @error('responsibility')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-left">
                                <button type="submit" class="btn btn-rounded btn-success">
                                    {{ trans('buttons.btn-add') }}
                                </button>
                            </div>
                        </div>
                    @endif
                </form>

                @foreach($editUser->experiences as $experience)
                    <div class="row pt-3">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.workplace') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $experience->workplace }}
                        </div>

                        <div class="col-12 col-md-2 btn-group text-right">

                            <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                data-target="#modalremove{{$experience->id}}">{{trans('buttons.btn-delete')}}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-experience', $experience->id),
                                'method' => 'DELETE',
                                'title' => trans('buttons.btn-delete') . " " . trans('sentence.experience'),
                                "description" => trans('sentence.delete_confirm') . " " . trans('sentence.experience') . "?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-delete'),
                                'modalKey' => "remove".$experience->id
                            ])

                            <button class="btn btn-rounded btn-success" data-toggle="modal"
                                data-target="#modaledit{{$experience->id}}">{{trans('buttons.btn-edit')}}</i>
                            </button>

                            @include('partials.edit', [
                                'url' => route('update-experience', $experience),
                                'method' => 'PUT',
                                'title' => trans('sentence.edit'),
                                "description" => "Czy na pewno chcesz zaktualizować doświadczenie?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-edit'),
                                'modalKey' => "edit".$experience->id
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('company.company_name') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $experience->exp_company_name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.city') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $experience->exp_city }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.start') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $experience->start_date }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.end') }}</div>

                        <div class="col-12 col-md-7">
                            @if($experience->end_date)
                                {{ $experience->end_date }}
                            @else
                                {{ __('Until now') }}
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.responsibilities') }}</div>

                        <div class="col-12 col-md-7">
                            {!! $experience->responsibility !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>