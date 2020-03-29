<div class="list-group list-group-flush">
  <a href="https://employmed.eu/blog-employmed" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }}" title="{{ __('Blog') }}">{{ __('Blog') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('advertisement-list') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('offer/list') ? 'bg-primary active' : null }}" title="{{ trans('offer.offers') }}">{{ trans('offer.offers') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('foreign-list') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('foreign/list') ? 'bg-primary active' : null }}" title="{{ trans('company.company-list') }}" title="{{ trans('offer.foreigns-list') }}">{{ trans('offer.foreigns-list') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('company-list') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('company/list') ? 'bg-primary active' : null }}" title="{{ trans('company.company-list') }}">{{ trans('company.company-list') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('course.index') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('lista-kursow') ? 'bg-primary active' : null }}" title="{{ trans('sentence.courses') }}">{{ trans('sentence.courses') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('contact.show') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('kontakt') ? 'bg-primary active' : null }}" title="{{ trans('email.contact-form') }}">{{ trans('email.contact-form') }}</a>
</div>
<div class="list-group list-group-flush">
  <a href="{{ route('advertisement-archive') }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('offer/archive') ? 'bg-primary active' : null }}" title="{{ trans('offer.offers-archive') }}">{{ trans('offer.offers-archive') }}</a>
</div>
@guest
@else
  @if(auth()->user()->hasRole('admin'))
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/users') ? 'bg-primary active' : null }}" href="{{ route('users.list') }}" title="{{ trans('sentence.user-list')}}">{{ trans('sentence.user-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/categories') ? 'bg-primary active' : null }}" href="{{ route('categories.index') }}" title="{{ trans('sentence.category-list')}}">{{ trans('sentence.category-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/posts') ? 'bg-primary active' : null }}" href="{{ route('posts.index') }}" title="{{ trans('sentence.posts-list')}}">{{ trans('sentence.posts-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/pages') ? 'bg-primary active' : null }}" href="{{ route('pages.index') }}" title="{{ trans('sentence.pages-list')}}">{{ trans('sentence.pages-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/newsletters') ? 'bg-primary active' : null }}" href="{{ route('newsletters.index') }}" title="{{ trans('email.newsletters-list')}}">{{ trans('email.newsletters-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/mailinglists') ? 'bg-primary active' : null }}" href="{{ route('mailinglists.index') }}" title="{{ trans('email.mailinglist-list')}}">{{ trans('email.mailinglist-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/recipients') ? 'bg-primary active' : null }}" href="{{ route('recipients.index') }}" title="{{ trans('email.recipients-list')}}">{{ trans('email.recipients-list')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/email-manager') ? 'bg-primary active' : null }}" href="{{ route('mailTracker_Index') }}" title="{{ trans('email.email-tracker')}}">{{ trans('email.email-tracker')}}</a>
    </div>
    <div class="list-group list-group-flush">
      <a class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is('admin/previews') ? 'bg-primary active' : null }}" href="{{ route('preview-list') }}" title="{{ trans('preview.list')}}">{{ trans('preview.list')}}</a>
    </div>
  @endif
@endguest
@foreach(\App\Page::where('is_active', 1)->get() as $page)
<div class="list-group list-group-flush">
  <a href="{{ route('site.page', $page->slug) }}" class="side-nav list-group-item list-group-item-action {{ $theme . '-theme' }} {{ Request::is($page->slug) ? 'bg-primary active' : null }}" title="{{ $page->title }}">{{ $page->title }}</a> 
</div>
@endforeach