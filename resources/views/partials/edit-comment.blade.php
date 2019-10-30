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
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="float-left">{!!__($description, $description_parameters)!!}</p>
                        </div>
                    </div>

                    <div class="row">
                        <label for="content" class="col-12 col-form-label">{{ __('Comment') }}</label>

                        <div class="col-12">
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" autocomplete="content" autofocus rows="3">{!! $comment->content ?? '' !!}</textarea>
                            @error('content')
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
    