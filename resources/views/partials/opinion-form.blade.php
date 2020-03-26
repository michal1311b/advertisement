<div class="card">
    <div class="card-header">{{ trans('sentence.comments')}}</div>
    <div class="col-md-12">
        @include('partials.validation-errors')
    </div>
    <div class="col-md-12">
        @include('partials.message')
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-12">
                @if(count($opinions) > 0)
                    <div class="pt-3">
                        {{ $opinions->links() }}
                    </div>
                    <div class="detailBox">
                        <div class="actionBox">
                            <ul class="commentList">
                                @foreach($opinions as $opinion)
                                    <li>
                                        <div class="commenterImage">
                                            <img src="{{ $opinion->user->avatar }}" />
                                        </div>
                                        <div class="commentText">
                                            <p class="font-weight-bolder">{{ $opinion->user->name }} {{ $opinion->user->profile->last_name }}</p>
                                            <p class="">{{ $opinion->content }}</p> 
                                            <span class="date sub-text">{{ $opinion->created_at }}</span>
                                        </div>
                                    </li>
                                    <div class="row no-gutters">
                                        @if((Auth::user()->hasRole('doctor') && Auth::user()->id === $opinion->user_id) || Auth::user()->hasRole('admin'))
                                            <div class="col-12">
                                                <div class="float-left">
                                                    <button class="btn btn-rounded btn-danger" data-toggle="modal"
                                                        data-target="#modalremove{{$opinion->id}}">
                                                        {{ trans('sentence.btn-delete') }}
                                                    </button>
                                                    @include('partials.confirmation', [
                                                        'url' => route('delete-opinion', $opinion->id),
                                                        'method' => 'DELETE',
                                                        'title' => trans('sentence.delete-comment'),
                                                        "description" => trans('sentence.delete-comment-confirm'),
                                                        "description_parameters" => [],
                                                        'button' => trans('sentence.btn-delete'),
                                                        'modalKey' => "remove".$opinion->id
                                                    ])
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12">
                <form method="POST" action="{{ route('opinion-offer', $advertisement->id) }}">
                    @csrf
                    @if($offerType === 'offer')
                        <input type="hidden" name="type" value="1">
                    @elseif($offerType === 'foreign')
                        <input type="hidden" name="type" value="2">
                    @endif
                    <div class="form-group">
                        <label for="content">{{ trans('sentence.message')}}</label>
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary">{{ trans('sentence.send')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>