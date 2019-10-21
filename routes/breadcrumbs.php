<?php

// Home
Breadcrumbs::for('home', function ($trail) {
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