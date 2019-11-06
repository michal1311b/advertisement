
<div class="list-group list-group-flush">
    <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action bg-light">{{ __('Blog') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-list') }}" class="list-group-item list-group-item-action bg-light">{{ __('Offers') }}</a>
</div>
<div class="list-group list-group-flush">
    @foreach(\App\Page::all() as $page)
        <a href="{{ route('site.page', $page->slug) }}" class="list-group-item list-group-item-action bg-light">{{ $page->title }}</a>
    @endforeach
</div>