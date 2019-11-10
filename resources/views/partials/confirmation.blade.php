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
                    <p class="float-left">{!!__($description, $description_parameters)!!}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">{{ trans('sentence.btn-cancel')}}</button>
                    <button type="submit" class="btn btn-sm btn-danger">{{__($button)}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
    