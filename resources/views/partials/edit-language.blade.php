<form action="{{ $url }}" method="POST">
    @csrf
    @method($method)
    <div class="modal fade" id="modal{{$modalKey}}" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__($title)}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-content">
                    <div class="col-12">
                        <p class="float-left">{!!__($description, $description_parameters)!!}</p>
                    </div>

                    <label for="lang_key" class="col-12 col-form-label">{{ trans('sentence.language')}}</label>

                    <div class="col-12">
                        <select data-live-search="true" class="form-control @error('lang_key') is-invalid @enderror" name="lang_key" id="lang_key">
                            <option selected>{{ trans('sentence.choose')}}</option>
                            @foreach($languages as $language)
                                <option 
                                @if($language->lang_key === $lang_key)
                                selected
                                @endif
                                value="{{ $language->lang_key }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                        @error('lang_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="level" class="col-12 col-form-label">{{ trans('sentence.level')}}</label>

                    <div class="col-12">
                        <select data-live-search="true" class="form-control @error('level') is-invalid @enderror" name="level" id="level">
                            <option @if($level === 'A1') selected @endif value="A1">{{ __('A1') }}</option>
                            <option @if($level === 'A2') selected @endif value="A2">{{ __('A2') }}</option>
                            <option @if($level === 'B1') selected @endif value="B1">{{ __('B1') }}</option>
                            <option @if($level === 'B2') selected @endif value="B2">{{ __('B2') }}</option>
                            <option @if($level === 'C1') selected @endif value="C1">{{ __('C1') }}</option>
                            <option @if($level === 'C2') selected @endif value="C2">{{ __('C2') }}</option>
                        </select>
                        @error('level')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-sm btn-primary" data-dismiss="modal">{{ trans('sentence.btn-cancel')}}</button>
                    <button type="submit" class="btn btn-rounded btn-sm btn-success">{{__($button)}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
        