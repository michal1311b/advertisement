
<div class="list-group list-group-flush">
    <a href="https://employmed.eu/blog-employmed" class="list-group-item list-group-item-action bg-light" title="{{ __('Blog') }}">{{ __('Blog') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-list') }}" class="list-group-item list-group-item-action bg-light" title="{{ trans('sentence.offers') }}">{{ trans('sentence.offers') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('foreign-list') }}" class="list-group-item list-group-item-action bg-light" title="{{ trans('sentence.foreigns-list') }}">{{ trans('sentence.foreigns-list') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('company-list') }}" class="list-group-item list-group-item-action bg-light" title="{{ trans('sentence.company-list') }}">{{ trans('sentence.company-list') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('course.index') }}" class="list-group-item list-group-item-action bg-light" title="{{ trans('sentence.courses') }}">{{ trans('sentence.courses') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('contact.show') }}" class="list-group-item list-group-item-action bg-light {{ Request::is('kontakt') ? 'text-primary active' : null }}" title="{{ trans('sentence.contact-form') }}">{{ trans('sentence.contact-form') }}</a>
</div>
<div class="list-group list-group-flush">
    <a href="{{ route('advertisement-archive') }}" class="list-group-item list-group-item-action bg-light {{ Request::is('offer/archive') ? 'text-primary active' : null }}" title="{{ trans('sentence.offers-archive') }}">{{ trans('sentence.offers-archive') }}</a>
</div>
@guest
@else
    @if(auth()->user()->hasRole('admin'))
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/users') ? 'text-primary active' : null }}" href="{{ route('users.list') }}" title="{{ trans('sentence.user-list')}}">{{ trans('sentence.user-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/categories') ? 'text-primary active' : null }}" href="{{ route('categories.index') }}" title="{{ trans('sentence.category-list')}}">{{ trans('sentence.category-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/posts') ? 'text-primary active' : null }}" href="{{ route('posts.index') }}" title="{{ trans('sentence.posts-list')}}">{{ trans('sentence.posts-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/pages') ? 'text-primary active' : null }}" href="{{ route('pages.index') }}" title="{{ trans('sentence.pages-list')}}">{{ trans('sentence.pages-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/newsletters') ? 'text-primary active' : null }}" href="{{ route('newsletters.index') }}" title="{{ trans('sentence.newsletters-list')}}">{{ trans('sentence.newsletters-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/mailinglists') ? 'text-primary active' : null }}" href="{{ route('mailinglists.index') }}" title="{{ trans('sentence.mailinglist-list')}}">{{ trans('sentence.mailinglist-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/recipients') ? 'text-primary active' : null }}" href="{{ route('recipients.index') }}" title="{{ trans('sentence.recipients-list')}}">{{ trans('sentence.recipients-list')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/email-manager') ? 'text-primary active' : null }}" href="{{ route('mailTracker_Index') }}" title="{{ trans('sentence.email-tracker')}}">{{ trans('sentence.email-tracker')}}</a>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light {{ Request::is('admin/previews') ? 'text-primary active' : null }}" href="{{ route('preview-list') }}" title="{{ trans('sentence.preview-list')}}">{{ trans('sentence.preview-list')}}</a>
        </div>
    @endif
@endguest
@foreach(\App\Page::where('is_active', 1)->get() as $page)
<div class="list-group list-group-flush">
    <a href="{{ route('site.page', $page->slug) }}" class="list-group-item list-group-item-action bg-light {{ Request::is($page->slug) ? 'text-primary active' : null }}" title="{{ $page->title }}">{{ $page->title }}</a> 
</div>
@endforeach