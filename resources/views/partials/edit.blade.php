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
                <div class="modal-body">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="float-left">{!!__($description, $description_parameters)!!}</p>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="workplace form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ $experience->workplace ?? '' }}" autocomplete="workplace" autofocus>
                            @error('workplace')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="exp_company_name form-control @error('exp_company_name') is-invalid @enderror" name="exp_company_name" value="{{ $experience->exp_company_name ?? '' }}" autocomplete="exp_company_name" autofocus>
                            @error('exp_company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="exp_city form-control @error('exp_city') is-invalid @enderror" name="exp_city" value="{{ $experience->exp_city ?? '' }}" autocomplete="exp_city" autofocus>
                            @error('exp_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="start_date form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $experience->start_date ?? '' }}" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                            @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="end_date form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $experience->end_date ?? '' }}" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                            @error('end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check py-2">
                        <input name="until_now" type="hidden" value="0">
                        <input class="form-check-input until_now" 
                        type="checkbox" name="until_now" value="1"
                        {{ $experience->until_now  == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="until_now">
                            {{ trans('sentence.until')}}
                        </label>
                    </div>

                    <div class="row">
                        <label for="responsibility" class="col-12 col-form-label">{{ trans('sentence.responsibilities')}}</label>

                        <div class="col-12">
                            <textarea type="responsibility" class="form-control @error('responsibility') is-invalid @enderror" name="responsibility" autocomplete="responsibility" autofocus rows="3">{!! $experience->responsibility ?? '' !!}</textarea>
                            @error('responsibility')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">{{__('Anuluj')}}</button>
                    <button type="submit" class="btn btn-sm btn-success">{{__($button)}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
    