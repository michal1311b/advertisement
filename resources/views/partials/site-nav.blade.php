
<div class="list-group list-group-flush">
    <a href="https://employmed.eu/blog-employmed" class="list-group-item list-group-item-action bg-light">{{ __('Blog') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-list') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.offers') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('foreign-list') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.foreigns-list') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('company-list') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.company-list') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('course.index') }}" class="list-group-item list-group-item-action bg-light">{{ trans('sentence.courses') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('contact.show') }}" class="list-group-item list-group-item-action bg-light {{ Request::is('kontakt') ? 'text-primary active' : null }}">{{ trans('sentence.contact-form') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-archive') }}" class="list-group-item list-group-item-action bg-light {{ Request::is('offer/archive') ? 'text-primary active' : null }}">{{ trans('sentence.offers-archive') }}</a>
</div>
@if(auth()->user()->hasRole('admin'))
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/users') ? 'text-primary active' : null }}" href="{{ route('users.list') }}">{{ trans('sentence.user-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/categories') ? 'text-primary active' : null }}" href="{{ route('categories.index') }}">{{ trans('sentence.category-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/posts') ? 'text-primary active' : null }}" href="{{ route('posts.index') }}">{{ trans('sentence.posts-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/pages') ? 'text-primary active' : null }}" href="{{ route('pages.index') }}">{{ trans('sentence.pages-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/newsletters') ? 'text-primary active' : null }}" href="{{ route('newsletters.index') }}">{{ trans('sentence.newsletters-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/mailinglists') ? 'text-primary active' : null }}" href="{{ route('mailinglists.index') }}">{{ trans('sentence.mailinglist-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/recipients') ? 'text-primary active' : null }}" href="{{ route('recipients.index') }}">{{ trans('sentence.recipients-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/email-manager') ? 'text-primary active' : null }}" href="{{ route('mailTracker_Index') }}">{{ trans('sentence.email-tracker')}}</a>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/previews') ? 'text-primary active' : null }}" href="{{ route('preview-list') }}">{{ trans('sentence.preview-list')}}</a>
    </div>
@endif
@foreach(\App\Page::where('is_active', 1)->get() as $page)
<div class="list-group list-group-flush">
    <a href="{{ route('site.page', $page->slug) }}" class="list-group-item list-group-item-action bg-light {{ Request::is($page->slug) ? 'text-primary active' : null }}">{{ $page->title }}</a> 
</div>
@endforeach