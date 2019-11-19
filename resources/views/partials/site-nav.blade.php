
<div class="list-group list-group-flush">
    <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action bg-light">{{ __('Blog') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-list') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.offers') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('company-list') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.company-list') }}</a>
</div>
<div class="list-group list-group-flush">
    @foreach(\App\Page::where('is_active', 1)->get() as $page)
        <a href="{{ route('site.page', $page->slug) }}" class="list-group-item list-group-item-action bg-light">{{ $page->title }}</a>
    @endforeach
</div>