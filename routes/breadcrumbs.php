<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

Breadcrumbs::for('site.homepage', function ($trail) {
    $trail->push(trans('sentence.homepage'), route('homepage'));
});

Breadcrumbs::for('cookies', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.cookies-policy'), route('cookies.show'));
});

Breadcrumbs::for('advertisement', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.offers-list'), route('advertisement-list'));
});

Breadcrumbs::for('advertisement-article', function ($trail, $advertisment) {
    $trail->parent('advertisement');
    $trail->push($advertisment->title, route('show-advertisement', ['id' => $advertisment->id, 'slug' => $advertisment->slug]));
});

Breadcrumbs::for('advertisement-edit', function ($trail, $advertisment) {
    $trail->parent('home');
    $trail->push(trans('sentence.user-offers'), route('user-advertisement-list'));
    $trail->push(trans('sentence.edit') . ' ' . $advertisment->title, route('edit-advertisement', $advertisment));
});

Breadcrumbs::for('edit-user', function ($trail, $user) {
    $trail->parent('home');
    $trail->push(trans('sentence.edit') . ' ' . $user->name, route('edit-user', $user));
});

Breadcrumbs::for('user-advertisements', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.user-offers'), route('user-advertisement-list'));
});

Breadcrumbs::for('user-advertisement-article', function ($trail, $advertisment) {
    $trail->parent('user-advertisements');
    $trail->push($advertisment->title, route('user-advertisement-show', [$advertisment, $advertisment->slug]));
});

Breadcrumbs::for('user-preferences', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.your-preferences'), route('user-prefered-locations'));
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.contact-list'), route('user-contact'));
});

Breadcrumbs::for('rooms', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.contact-list'), route('user-rooms'));
});

Breadcrumbs::for('room', function ($trail, $room) {
    $trail->parent('rooms');
    $trail->push(trans('sentence.reply-form'), route('show-room', $room));
});

Breadcrumbs::for('reply', function ($trail) {
    $trail->parent('contacts');
    $trail->push(trans('sentence.reply-form'), route('user-reply'));
});

Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
    $trail->push(trans('sentence.category-create'), route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
    $trail->push(trans('sentence.edit') . $category->name, route('categories.edit', $category));
});

Breadcrumbs::for('posts.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
    $trail->push(trans('sentence.post-create'), route('posts.create'));
});

Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
});

Breadcrumbs::for('posts.edit', function ($trail, $post) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
    $trail->push(trans('sentence.edit') . $post->title, route('posts.edit', $post));
});

Breadcrumbs::for('posts.list', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
});

Breadcrumbs::for('blog-post', function ($trail, $post) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
    $trail->push($post->title, route('blog.show', $post));
});

Breadcrumbs::for('tag.list', function ($trail, $tag) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
    $trail->push($tag, route('postTag', $tag));
});

Breadcrumbs::for('pages.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
    $trail->push(trans('sentence.pages-create'), route('pages.create'));
});

Breadcrumbs::for('pages.edit', function ($trail, $page) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
    $trail->push(trans('sentence.edit') . $page->title, route('pages.edit', $page));
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.user-list'), route('users.list'));
});

Breadcrumbs::for('site.page', function ($trail, $page) {
    $trail->parent('site.homepage');
    $trail->push($page->title, route('site.page', $page->slug));
});

Breadcrumbs::for('company-list', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.company-list'), route('company-list'));
});

Breadcrumbs::for('company-site', function ($trail, $company) {
    $trail->parent('company-list');
    $trail->push(trans('sentence.company-offers') . ' ' . $company->profile->company_name, route('company-show', $company));
});