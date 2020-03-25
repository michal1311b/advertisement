<div class="tab-pane container fade" id="menu5">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">{{ __('CV') }}</div>

            <div class="card-body">
                @if($editUser->doctor != null)
                    @if($editUser->doctor->cv !== null)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ $editUser->doctor->cv }}" class="btn btn-primary" target="_blank">{{ trans('sentence.show-cv') }}</a>
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#modalremovecv{{$editUser->doctor->id}}">{{ trans('sentence.btn-delete') }}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-user-cv', $editUser->doctor),
                                'method' => 'DELETE',
                                'title' => trans('sentence.btn-delete') . " CV",
                                "description" => trans('sentence.delete_confirm') ." CV?",
                                "description_parameters" => [],
                                'button' => trans('sentence.btn-delete'),
                                'modalKey' => "removecv".$editUser->doctor->id
                            ])
                        </div>
                    @else
                        <div class="dropzone-previews"></div>
                        <form method="POST" action="{{ route('upload-cv') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="pb-3">{{ trans('sentence.add-cv-file') }}</div>
                                    <input type="file" class="dropzone" id="dropzone" name="cv">

                                    <div id="template-preview">
                                        <div class="dz-preview dz-file-preview well" id="dz-preview-template">
                                            <div class="dz-details">
                                                <div class="dz-filename">
                                                    <span data-dz-name></span>
                                                </div>
                                                <div class="dz-size" data-dz-size></div>
                                            </div>
                                            <div class="dz-progress">
                                                <span class="dz-upload" data-dz-uploadprogress></span>
                                            </div>
                                            <div class="dz-success-mark"><span></span></div>
                                            <div class="dz-error-mark"><span></span></div>
                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('sentence.btn-upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                @endif

                @if($editUser->nurse != null)
                    @if($editUser->nurse->cv != null)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ $editUser->nurse->cv }}" class="btn btn-primary" target="_blank">{{ trans('sentence.show-cv') }}</a>
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="#modalremovenursecv{{$editUser->nurse->id}}">{{ trans('sentence.btn-delete') }}</i>
                            </button>

                            @include('partials.confirmation', [
                                'url' => route('delete-nurse-cv', $editUser->nurse),
                                'method' => 'DELETE',
                                'title' => trans('sentence.btn-delete') . " CV",
                                "description" => trans('sentence.delete_confirm') ." CV?",
                                "description_parameters" => [],
                                'button' => trans('sentence.btn-delete'),
                                'modalKey' => "removenursecv".$editUser->nurse->id
                            ])
                        </div>
                    @else
                        <div class="dropzone-previews"></div>
                        <form method="POST" action="{{ route('upload-cv') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="pb-3">{{ trans('sentence.add-cv-file') }}</div>
                                    <input type="file" class="dropzone" id="dropzone" name="cv">

                                    <div id="template-preview">
                                        <div class="dz-preview dz-file-preview well" id="dz-preview-template">
                                            <div class="dz-details">
                                                <div class="dz-filename">
                                                    <span data-dz-name></span>
                                                </div>
                                                <div class="dz-size" data-dz-size></div>
                                            </div>
                                            <div class="dz-progress">
                                                <span class="dz-upload" data-dz-uploadprogress></span>
                                            </div>
                                            <div class="dz-success-mark"><span></span></div>
                                            <div class="dz-error-mark"><span></span></div>
                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('sentence.btn-upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>