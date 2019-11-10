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
                            <input type="text" class="name form-control @error('name') is-invalid @enderror" name="name" value="{{ $course->name ?? '' }}" autocomplete="name" autofocus>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="organizer form-control @error('organizer') is-invalid @enderror" name="organizer" value="{{ $course->organizer ?? '' }}" autocomplete="exp_city" autofocus>
                            @error('organizer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="start_date form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $course->start_date ?? '' }}" autocomplete="start_date" autofocus placeholder="YYYY-MM-DD">
                            @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-12">
                            <input type="text" class="end_date form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $course->end_date ?? '' }}" autocomplete="end_date" autofocus placeholder="YYYY-MM-DD">
                            @error('end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">{{ trans('sentence.btn-cancel')}}</button>
                    <button type="submit" class="btn btn-sm btn-success">{{__($button)}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
    