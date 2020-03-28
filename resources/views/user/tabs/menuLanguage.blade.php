<div class="tab-pane container fade" id="menu3">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ trans('sentence.edit-language') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('store-language', $editUser) }}">
                    @csrf
                    @if($editUser->doctor !== null || $editUser->nurse !== null)
                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="lang_key">{{ trans('sentence.language') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('lang_key') is-invalid @enderror" name="lang_key" id="lang_key">
                                    <option selected value="">{{ trans('sentence.choose') }}</option>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->lang_key }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                @error('lang_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-3 col-form-label text-md-right" for="level">{{ trans('sentence.level') }}</label>
                            <div class="col-12 col-md-9">
                                <select data-live-search="true" class="form-control @error('level') is-invalid @enderror" name="level" id="level">
                                    <option selected value="">{{ trans('sentence.choose') }}</option>
                                    <option value="A1">{{ __('A1') }}</option>
                                    <option value="A2">{{ __('A2') }}</option>
                                    <option value="B1">{{ __('B1') }}</option>
                                    <option value="B2">{{ __('B2') }}</option>
                                    <option value="C1">{{ __('C1') }}</option>
                                    <option value="C2">{{ __('C2') }}</option>
                                </select>
                                @error('level')
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

                @foreach($userLanguages as $language)
                    <div class="row pt-3">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.language') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $language->language->name }}
                        </div>

                        <div class="col-12 col-md-2 btn-group text-right">

                            <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                data-target="#modalremove{{$language->language->lang_key}}">{{ trans('buttons.btn-delete') }}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-user-language', $language->id),
                                'method' => 'DELETE',
                                'title' => trans('buttons.btn-delete') . " " . trans('sentence.language'),
                                "description" => trans('sentence.delete_confirm') . " " . trans('sentence.language') . "?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-delete'),
                                'modalKey' => "remove".$language->language->lang_key
                            ])

                            <button class="btn btn-rounded btn-success" data-toggle="modal"
                                data-target="#modaleditlang{{$language->language->lang_key}}">{{ trans('sentence.edit') }}</i>
                            </button>

                            @include('partials.edit-language', [
                                'url' => route('update-user-language', [$language->language, $editUser]),
                                'method' => 'PUT',
                                'title' => trans('sentence.edit'),
                                'lang_key' => $language->language->lang_key,
                                'level' => $language->level,
                                "description" => trans('sentence.edit_confirm') . " " . trans('sentence.language') . "?",
                                "description_parameters" => [],
                                'button' => trans('buttons.btn-edit'),
                                'modalKey' => "editlang".$language->language->lang_key
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="font-weight-bold col-12 col-md-3 text-md-right">{{ trans('sentence.level') }}</div>

                        <div class="col-12 col-md-7">
                            {{ $language->level }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>