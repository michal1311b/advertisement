<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

Breadcrumbs::for('site.homepage', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

Breadcrumbs::for('advertisement', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of Advertisements'), route('advertisement-list'));
});

Breadcrumbs::for('advertisement-article', function ($trail, $advertisment) {
    $trail->parent('advertisement');
    $trail->push($advertisment->title, route('show-advertisement', $advertisment));
});

Breadcrumbs::for('advertisement-edit', function ($trail, $advertisment) {
    $trail->parent('home');
    $trail->push(__('Edit: ') . $advertisment->title, route('edit-advertisement', $advertisment));
});

Breadcrumbs::for('edit-user', function ($trail, $user) {
    $trail->parent('home');
    $trail->push(__('Edit: ') . $user->name, route('edit-user', $user));
});

Breadcrumbs::for('user-advertisements', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User List of Advertisements'), route('user-advertisement-list'));
});

Breadcrumbs::for('user-advertisement-article', function ($trail, $advertisment) {
    $trail->parent('user-advertisements');
    $trail->push($advertisment->title, route('user-advertisement-show', $advertisment));
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of contacts'), route('user-contact'));
});

Breadcrumbs::for('reply', function ($trail) {
    $trail->parent('contacts');
    $trail->push(__('Reply form'), route('user-reply'));
});

Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of Categories'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Categories'), route('categories.index'));
    $trail->push(__('List of Categories'), route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('home');
    $trail->push(__('Categories'), route('categories.index'));
    $trail->push(__('Edit: ') . $category->name, route('categories.edit', $category));
});

Breadcrumbs::for('posts.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Posts'), route('posts.index'));
    $trail->push(__('List of Posts'), route('posts.create'));
});

Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of Posts'), route('posts.index'));
});

Breadcrumbs::for('posts.edit', function ($trail, $post) {
    $trail->parent('home');
    $trail->push(__('Posts'), route('posts.index'));
    $trail->push(__('Edit: ') . $post->title, route('posts.edit', $post));
});

Breadcrumbs::for('posts.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of Posts'), route('blog.index'));
});

Breadcrumbs::for('blog-post', function ($trail, $post) {
    $trail->parent('home');
    $trail->push(__('List of Posts'), route('blog.index'));
    $trail->push($post->title, route('blog.show', $post));
});

Breadcrumbs::for('tag.list', function ($trail, $tag) {
    $trail->parent('home');
    $trail->push(__('List of Posts'), route('blog.index'));
    $trail->push($tag, route('postTag', $tag));
});

Breadcrumbs::for('pages.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Pages'), route('pages.index'));
    $trail->push(__('Create page'), route('pages.create'));
});

Breadcrumbs::for('pages.edit', function ($trail, $page) {
    $trail->parent('home');
    $trail->push(__('Pages'), route('pages.index'));
    $trail->push(__('Edit: ') . $page->title, route('pages.edit', $page));
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('home');
    $trail->push(__('List of Pages'), route('pages.index'));
});

Breadcrumbs::for('site.page', function ($trail, $page) {
    $trail->parent('home');
    $trail->push($page->title, route('site.page', $page->slug));
});